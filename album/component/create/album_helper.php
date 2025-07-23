<?php

// this file contains helper functions for album creation
function fetchArtists($conn)
{
    $stmtArtists = $conn->query("SELECT ArtistId, Name FROM artists ORDER BY Name");
    return $stmtArtists->fetch_all(MYSQLI_ASSOC);
}

// Function to create a new artist
function createNewArtist($conn, $newArtist)
{
    try {
        // First check if artist already exists (case-insensitive)
        $checkStmt = $conn->prepare("SELECT ArtistId FROM artists WHERE LOWER(Name) = LOWER(?)");
        $checkStmt->bind_param("s", $newArtist);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Artist already exists, return existing ID
            $existing = $result->fetch_assoc();
            return $existing['ArtistId'];
        }

        // Artist doesn't exist, create new one
        $stmtNewArtist = $conn->prepare("INSERT INTO artists (Name) VALUES (?)");
        if (!$stmtNewArtist) {
            error_log("Prepare failed: " . $conn->error);
            return false;
        }

        $stmtNewArtist->bind_param("s", $newArtist);

        if ($stmtNewArtist->execute()) {
            $newId = $stmtNewArtist->insert_id;
            error_log("New artist created: ID = $newId, Name = $newArtist");
            return $newId;
        } else {
            error_log("Execute failed: " . $stmtNewArtist->error);
            return false;
        }
    } catch (Exception $e) {
        error_log("Exception in createNewArtist: " . $e->getMessage());
        return false;
    }
}

// Function to check if an artist exists
function isArtistValid($conn, $artistId)
{
    $checkArtist = $conn->prepare("SELECT 1 FROM artists WHERE ArtistId = ?");
    if (!$checkArtist) {
        return false;
    }

    $checkArtist->bind_param("i", $artistId);
    $checkArtist->execute();
    return $checkArtist->get_result()->fetch_row() !== null;
}
?>