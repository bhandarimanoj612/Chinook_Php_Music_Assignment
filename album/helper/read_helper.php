<?php
declare(strict_types=1);
include "../db.php";

// Get and sanitize input
$search = trim($_GET['search'] ?? '');
$sort = $_GET['sort'] ?? 'Title';
$order = strtoupper($_GET['order'] ?? 'ASC');
$order = ($order === 'DESC') ? 'DESC' : 'ASC';

// Map sort values to actual column names
$sortColumns = [
    'AlbumId' => 'a.AlbumId',
    'Title' => 'a.Title',
    'ArtistName' => 'ar.Name'
];

// Validate sort column
if (!array_key_exists($sort, $sortColumns)) {
    $sort = 'Title';
}
$actualSortColumn = $sortColumns[$sort];

// Pagination
$page = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 10;
$offset = ($page - 1) * $perPage;

// Build search conditions
$whereClause = "";
$params = [];
$types = "";

if ($search) {
    $conditions = [];
    // ID search if numeric
    if (is_numeric($search)) {
        $conditions[] = "a.AlbumId = ?";
        $params[] = (int) $search;
        $types .= "i";
    }
    // Text search
    $pattern = "%{$search}%";
    $conditions[] = "a.Title LIKE ?";
    $conditions[] = "ar.Name LIKE ?";
    $params[] = $pattern;
    $params[] = $pattern;
    $types .= "ss";
    $whereClause = "WHERE " . implode(" OR ", $conditions);
}

// Get total album count (no filter)
$albumCountStmt = $conn->prepare("SELECT COUNT(*) FROM albums");
$albumCountStmt->execute();
$albumCount = $albumCountStmt->get_result()->fetch_row()[0];
$albumCountStmt->close();

// Get filtered count
$countSql = "SELECT COUNT(*) FROM albums a JOIN artists ar ON a.ArtistId = ar.ArtistId $whereClause";
$countStmt = $conn->prepare($countSql);
if ($search) {
    $countStmt->bind_param($types, ...$params);
}
$countStmt->execute();
$totalRows = $countStmt->get_result()->fetch_row()[0];
$countStmt->close();

$totalPages = (int) ceil($totalRows / $perPage);

// Get data
$dataSql = "
    SELECT a.AlbumId, a.Title, ar.Name AS ArtistName
    FROM albums a
    JOIN artists ar ON a.ArtistId = ar.ArtistId
    $whereClause
    ORDER BY $actualSortColumn $order
    LIMIT ? OFFSET ?
";
$stmt = $conn->prepare($dataSql);
$bindParams = $params;
$bindTypes = $types . "ii";
$bindParams[] = $perPage;
$bindParams[] = $offset;
$stmt->bind_param($bindTypes, ...$bindParams);
$stmt->execute();
$result = $stmt->get_result();
?>