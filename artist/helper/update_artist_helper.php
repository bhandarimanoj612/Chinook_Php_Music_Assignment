<?php
declare(strict_types=1);
include "../db.php";

// Initialize variables for error and success messages
$error = '';
$success = '';
$id = (int) ($_GET['id'] ?? 0);

// If no ID is provided or it's invalid, redirect to the artist list
if ($id <= 0) {
    header("Location: read_artist.php");
    exit();
}

// Fetch artist data
$stmt = $conn->prepare("SELECT * FROM artists WHERE ArtistId = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$artist = $stmt->get_result()->fetch_assoc();

// If artist not found, redirect to the artist list
if (!$artist) {
    header("Location: read_artist.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    if (!empty($name)) {

        // Update artist data
        $update = $conn->prepare("UPDATE artists SET Name = ? WHERE ArtistId = ?");

        $update->bind_param("si", $name, $id);

        // Execute the update query
        if ($update->execute()) {
            $success = "Artist updated successfully!";
            $artist['Name'] = $name; // Update local data
        } else {
            $error = "Error updating artist. Please try again.";
        }
    } else {
        $error = "Artist name is required.";
    }
}
?>