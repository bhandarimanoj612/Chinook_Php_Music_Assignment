<?php
declare(strict_types=1);
include "../db.php";

// Input
$search = trim($_GET['search'] ?? '');
$sort = $_GET['sort'] ?? 'ArtistId';
$order = ($_GET['order'] ?? 'ASC') === 'DESC' ? 'DESC' : 'ASC';
$page = max(1, (int) ($_GET['page'] ?? 1));
$searchBy = $_GET['search_by'] ?? $sort;

$perPage = 10;
$offset = ($page - 1) * $perPage;

// Validate columns
$allowedSort = ['ArtistId', 'Name'];
$allowedSearch = ['ArtistId', 'Name'];

if (!in_array($sort, $allowedSort, true))
    $sort = 'ArtistId';
if (!in_array($searchBy, $allowedSearch, true))
    $searchBy = 'Name';

// Search conditions
$searchCondition = "1=1";
$searchParams = [];
$searchTypes = "";

if ($search !== '') {
    if ($searchBy === 'ArtistId') {
        $searchCondition = "ArtistId = ?";
        $searchParams[] = (int) $search;
        $searchTypes .= "i";
    } else {
        $searchCondition = "Name LIKE ?";
        $searchParams[] = "%$search%";
        $searchTypes .= "s";
    }
}

// Count total
$countSql = "SELECT COUNT(*) AS c FROM artists WHERE $searchCondition";

$stmtCount = $conn->prepare($countSql);
if ($searchParams) {
    $stmtCount->bind_param($searchTypes, ...$searchParams);
}
$stmtCount->execute();
$total = (int) $stmtCount->get_result()->fetch_assoc()['c'];
$stmtCount->close();

$totalPages = (int) ceil($total / $perPage);

// Fetch paginated data
$sql = "SELECT ArtistId, Name FROM artists
        WHERE $searchCondition
        ORDER BY $sort $order
        LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$types = $searchTypes . "ii";
$params = array_merge($searchParams, [$perPage, $offset]);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$artists = $stmt->get_result();

// Helper: Preserve query string
function buildQuery($params)
{
    global $search, $searchBy, $sort, $order;
    return http_build_query(array_merge([
        'search' => $search,
        'search_by' => $searchBy,
        'sort' => $sort,
        'order' => $order
    ], $params));
}
?>