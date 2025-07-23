<?php
declare(strict_types=1);
include "../db.php";

$error = '';
$success = '';
$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: ../read_album.php");
    exit();
}

// Fetch album data
$stmt = $conn->prepare("SELECT * FROM albums WHERE AlbumId = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$album = $stmt->get_result()->fetch_assoc();

if (!$album) {
    header("Location: ../read_album.php");
    exit();
}

$title = $album['Title'];
$artistId = $album['ArtistId'];

// Fetch all artists for dropdown
$artists = $conn->query("SELECT ArtistId, Name FROM artists ORDER BY Name")->fetch_all(MYSQLI_ASSOC);

// Fetch existing tracks for this album
$trackStmt = $conn->prepare("SELECT TrackId, Name FROM tracks WHERE AlbumId = ? ORDER BY TrackId");
$trackStmt->bind_param("i", $id);
$trackStmt->execute();
$existingTracks = $trackStmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Initialize track titles and IDs
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $artistId = (int) $_POST['artistId'];
    $trackTitles = $_POST['tracks'] ?? [];
    $trackIds = $_POST['track_ids'] ?? [];

    // Validate inputs
    if (strlen($title) < 2) {
        $error = "Album title must be at least 2 characters.";
    } elseif (!$conn->query("SELECT 1 FROM artists WHERE ArtistId = $artistId")->fetch_row()) {
        $error = "Invalid artist selected.";
    } else {
        // Begin transaction
        $conn->begin_transaction();

        try {
            // Update album
            $update = $conn->prepare("UPDATE albums SET Title = ?, ArtistId = ? WHERE AlbumId = ?");
            $update->bind_param("sii", $title, $artistId, $id);
            $update->execute();

            // Handle tracks
            $processedTrackIds = [];

            // Update or insert tracks
            foreach ($trackTitles as $index => $trackTitle) {
                $trackTitle = trim($trackTitle);
                if ($trackTitle === '')
                    continue;

                $trackId = isset($trackIds[$index]) ? (int) $trackIds[$index] : 0;

                if ($trackId > 0) {
                    // Update existing track
                    $updateTrack = $conn->prepare("UPDATE tracks SET Name = ? WHERE TrackId = ? AND AlbumId = ?");
                    $updateTrack->bind_param("sii", $trackTitle, $trackId, $id);
                    $updateTrack->execute();
                    $processedTrackIds[] = $trackId;
                } else {
                    // Insert new track
                    $insertTrack = $conn->prepare("INSERT INTO tracks (Name, AlbumId, MediaTypeId, GenreId, Composer, Milliseconds, Bytes, UnitPrice) VALUES (?, ?, 1, 1, '', 0, 0, 0.99)");
                    $insertTrack->bind_param("si", $trackTitle, $id);
                    $insertTrack->execute();
                    $processedTrackIds[] = $conn->insert_id;
                }
            }

            // Delete tracks that were removed
            if (!empty($processedTrackIds)) {
                $placeholders = str_repeat('?,', count($processedTrackIds) - 1) . '?';
                $deleteStmt = $conn->prepare("DELETE FROM tracks WHERE AlbumId = ? AND TrackId NOT IN ($placeholders)");
                $types = 'i' . str_repeat('i', count($processedTrackIds));
                $deleteStmt->bind_param($types, $id, ...$processedTrackIds);
                $deleteStmt->execute();
            } else {
                // Delete all tracks if none provided
                $deleteAllTracks = $conn->prepare("DELETE FROM tracks WHERE AlbumId = ?");
                $deleteAllTracks->bind_param("i", $id);
                $deleteAllTracks->execute();
            }

            $conn->commit();
            $success = "Album and tracks updated successfully!";

            // Refresh existing tracks after update
            $trackStmt = $conn->prepare("SELECT TrackId, Name FROM tracks WHERE AlbumId = ? ORDER BY TrackId");
            $trackStmt->bind_param("i", $id);
            $trackStmt->execute();
            $existingTracks = $trackStmt->get_result()->fetch_all(MYSQLI_ASSOC);

        } catch (Exception $e) {
            $conn->rollback();
            $error = "Failed to update album and tracks. Please try again.";
        }
    }
}
?>