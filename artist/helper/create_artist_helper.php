<?php
declare(strict_types=1);
// This file is responsible for handling the creation of artists in the Chinook Music Manager application.
include "../db.php";

$error = '';
$success = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the artist name from the form submission
    $name = trim($_POST["name"]);
    // Validate the artist name
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO artists (Name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            $success = "Artist created successfully!";
            header("Location: read_artist.php?created=" . urlencode($name));
            exit();
        } else {
            $error = "Error creating artist. Please try again.";
        }

    } else {
        // If the artist name is empty, set an error message
        $error = "Artist name is required.";
    }
}
?>