<?php
declare(strict_types=1);
include "../db.php";

// Get album ID from URL
$albumId = (int) ($_GET['id'] ?? 0);
if ($albumId <= 0) {
    header('Location: index.php?error=invalid_album_id');
    exit;
}

// Get pagination and search parameters
$page = max(1, (int) ($_GET['page'] ?? 1));
$limit = 10;
$offset = ($page - 1) * $limit;
$search = trim($_GET['search'] ?? '');

// Get album details
$albumSql = "
    SELECT a.AlbumId, a.Title, ar.ArtistId, ar.Name AS ArtistName
    FROM albums a 
    JOIN artists ar ON a.ArtistId = ar.ArtistId 
    WHERE a.AlbumId = ?
";
$stmtAlbum = $conn->prepare($albumSql);
$stmtAlbum->bind_param("i", $albumId);
$stmtAlbum->execute();
$albumResult = $stmtAlbum->get_result();

if ($albumResult->num_rows === 0) {
    header('Location: index.php?error=album_not_found');
    exit;
}

$album = $albumResult->fetch_assoc();
$stmtAlbum->close();

// Build the WHERE clause for search
$searchCondition = "";
$searchParams = [$albumId];
$paramTypes = "i";

// If search term is provided, add it to the WHERE clause
if (!empty($search)) {
    $searchCondition = " AND (t.Name LIKE ? OR t.Composer LIKE ? OR g.Name LIKE ? OR mt.Name LIKE ?)";
    $searchTerm = "%$search%";
    $searchParams = array_merge($searchParams, [$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
    $paramTypes .= "ssss";
}

// Get total count of tracks for pagination
$countSql = "
    SELECT COUNT(*) as total
    FROM tracks t
    LEFT JOIN media_types mt ON t.MediaTypeId = mt.MediaTypeId
    LEFT JOIN genres g ON t.GenreId = g.GenreId
    WHERE t.AlbumId = ? $searchCondition
";

// Prepare the count statement

$stmtCount = $conn->prepare($countSql);
$stmtCount->bind_param($paramTypes, ...$searchParams);
$stmtCount->execute();
$countResult = $stmtCount->get_result();
$totalTracks = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalTracks / $limit);
$stmtCount->close();

// Get tracks for this album with pagination and search
$tracksSql = "
    SELECT 
        t.TrackId, 
        t.Name as TrackName, 
        t.Composer,
        t.Milliseconds,
        t.Bytes,
        t.UnitPrice,
        mt.Name as MediaType,
        g.Name as Genre
    FROM tracks t
    LEFT JOIN media_types mt ON t.MediaTypeId = mt.MediaTypeId
    LEFT JOIN genres g ON t.GenreId = g.GenreId
    WHERE t.AlbumId = ? $searchCondition
    ORDER BY t.TrackId
    LIMIT ? OFFSET ?
";
$trackParams = array_merge($searchParams, [$limit, $offset]);
$trackParamTypes = $paramTypes . "ii";
$stmtTracks = $conn->prepare($tracksSql);
$stmtTracks->bind_param($trackParamTypes, ...$trackParams);
$stmtTracks->execute();
$tracksResult = $stmtTracks->get_result();

// Get all tracks for statistics (without pagination)
$statsSql = "
    SELECT 
        t.Milliseconds,
        t.Bytes,
        t.UnitPrice
    FROM tracks t
    WHERE t.AlbumId = ?
";
$stmtStats = $conn->prepare($statsSql);
$stmtStats->bind_param("i", $albumId);
$stmtStats->execute();
$statsResult = $stmtStats->get_result();

// Calculate album statistics
$totalDuration = 0;
$totalSize = 0;
$trackCount = 0;
$totalPrice = 0;

// Loop through stats to calculate total duration, size, and price
while ($stat = $statsResult->fetch_assoc()) {
    $totalDuration += $stat['Milliseconds'] ?? 0;
    $totalSize += $stat['Bytes'] ?? 0;
    $totalPrice += $stat['UnitPrice'] ?? 0;
    $trackCount++;
}
// Calculate average price
$avgPrice = $trackCount > 0 ? $totalPrice / $trackCount : 0;
$stmtStats->close();

// Helper function to format duration
function formatDuration($milliseconds)
{
    if (!$milliseconds)
        return 'N/A';
    $seconds = $milliseconds / 1000;
    $minutes = floor($seconds / 60);
    $seconds = $seconds % 60;
    return sprintf("%d:%02d", $minutes, $seconds);
}

// Helper function to format file size
function formatFileSize($bytes)
{
    if (!$bytes)
        return 'N/A';
    if ($bytes < 1024)
        return $bytes . ' B';
    if ($bytes < 1048576)
        return round($bytes / 1024, 1) . ' KB';
    return round($bytes / 1048576, 1) . ' MB';
}

// Function to generate pagination URL
function getPaginationUrl($page, $search = '')
{
    global $albumId;
    $params = ['id' => $albumId, 'page' => $page];
    if (!empty($search)) {
        $params['search'] = $search;
    }
    return '?' . http_build_query($params);
}
?>