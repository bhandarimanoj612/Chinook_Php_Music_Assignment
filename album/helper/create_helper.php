<?php
declare(strict_types=1);
include "../db.php";
include "component/create/album_helper.php";

$title = $artistId = "";
$errors = [];
$trackTitles = [];

// Get all artists for dropdown
$artists = fetchArtists($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // DEBUG: Let's see what's actually being submitted
    error_log("POST data: " . print_r($_POST, true));

    $title = trim($_POST['title'] ?? '');
    $artistId = $_POST['artistId'] ?? '';
    $newArtist = trim($_POST['newArtist'] ?? '');
    $trackTitles = $_POST['tracks'] ?? [];

    // DEBUG: Log the processed values
    error_log("Processed - title: '$title', artistId: '$artistId', newArtist: '$newArtist'");

    // Validation for title
    if ($title === '' || strlen($title) < 2) {
        $errors[] = 'Title must be at least 2 characters.';
    }

    // Artist validation - handle mutual exclusion properly
    $finalArtistId = 0;

    // Check if user is creating a new artist (prioritize this)
    if (!empty($newArtist)) {
        error_log("Processing new artist: $newArtist");
        if (strlen($newArtist) < 2) {
            $errors[] = 'New artist name must be at least 2 characters.';
        } else {
            $insertedArtistId = createNewArtist($conn, $newArtist);
            if ($insertedArtistId) {
                $finalArtistId = $insertedArtistId;
                error_log("New artist created with ID: $finalArtistId");
            } else {
                $errors[] = 'Failed to create new artist.';
            }
        }
    }
    // If no new artist, check if existing artist is selected
    else if (!empty($artistId) && $artistId !== '' && $artistId !== '0') {
        $artistIdInt = (int) $artistId;
        error_log("Processing existing artist ID: $artistIdInt");
        if ($artistIdInt <= 0 || !isArtistValid($conn, $artistIdInt)) {
            $errors[] = 'Invalid artist selected.';
        } else {
            $finalArtistId = $artistIdInt;
            error_log("Using existing artist ID: $finalArtistId");
        }
    }
    // Neither new artist nor existing artist provided
    else {
        error_log("No artist provided - artistId: '$artistId', newArtist: '$newArtist'");
        $errors[] = 'Please select an artist or enter a new one.';
    }

    error_log("Final artist ID: $finalArtistId");
    error_log("Errors: " . print_r($errors, true));

    // If no errors, proceed with album creation
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO albums (Title, ArtistId) VALUES (?, ?)");
        $stmt->bind_param("si", $title, $finalArtistId);

        if ($stmt->execute()) {
            $albumId = $stmt->insert_id;

            // Insert tracks
            if (!empty($trackTitles)) {
                $stmtTrack = $conn->prepare("INSERT INTO tracks (Name, AlbumId, MediaTypeId, GenreId, Composer, Milliseconds, Bytes, UnitPrice) VALUES (?, ?, 1, 1, '', 0, 0, 0.99)");
                foreach ($trackTitles as $trackName) {
                    $trackName = trim($trackName);
                    if ($trackName !== '') {
                        $stmtTrack->bind_param("si", $trackName, $albumId);
                        $stmtTrack->execute();
                    }
                }
            }

            header("Location: read_album.php?created=" . urlencode($title));
            exit;
        } else {
            $errors[] = 'Database error: Could not create album.';
        }
    }
}
?>