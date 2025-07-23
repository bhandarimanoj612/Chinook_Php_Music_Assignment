<?php
declare(strict_types=1);
// This file is responsible for handling the deletion of artists in the Chinook Music Manager application.
include "../db.php";

// Get the artist ID from the query parameters
$id = $_GET["id"] ?? null;

// If no ID is provided, redirect to the artist list
if (!$id) {
    header("Location: read_artist.php");
    exit();
}

// Fetch artist info
$stmt = $conn->prepare("SELECT Name FROM artists WHERE ArtistId = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$artist = $stmt->get_result()->fetch_assoc();

// If artist not found, redirect to the artist list
if (!$artist) {
    header("Location: read_artist.php");
    exit();
}

// Handle deletion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $artistName = $artist['Name']; // Store name before deletion

    $stmt = $conn->prepare("DELETE FROM artists WHERE ArtistId = ?");

    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect with success message
    header("Location: read_artist.php?deleted=" . urlencode($artistName));
    exit();
}
?>