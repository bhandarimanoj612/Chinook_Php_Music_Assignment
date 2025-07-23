<?php
declare(strict_types=1);

//  This file handles the deletion of an album and its associated tracks 
include "../db.php";

$id = (int) ($_GET["id"] ?? 0);

if (!$id) {
    header("Location: ../read_album.php");
    exit();
}

// Fetch album info
$stmt = $conn->prepare("SELECT Title FROM albums WHERE AlbumId = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$album = $stmt->get_result()->fetch_assoc();

if (!$album) {
    header("Location: ../read_album.php");
    exit();
}

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $albumTitle = $album['Title']; // Store title before deletion

    // Delete associated tracks first (if not using ON DELETE CASCADE)
    $stmt = $conn->prepare("DELETE FROM tracks WHERE AlbumId = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Delete album
    $stmt = $conn->prepare("DELETE FROM albums WHERE AlbumId = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect with success message
    header("Location: read_album.php?deleted=" . urlencode($albumTitle));
    exit();
}
?>