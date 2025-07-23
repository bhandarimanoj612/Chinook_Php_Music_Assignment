<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "chinook"; // importing Chinook.sql to create the database

$conn = new mysqli($host, $username, $password, $dbname);

// for getting total albums, artists, and tracks
$albumCount = $artistCount = $trackCount = 0;

$sqlAlbum = "SELECT COUNT(*) as total FROM albums";
$sqlArtist = "SELECT COUNT(*) as total FROM artists";
$sqlTrack = "SELECT COUNT(*) as total FROM tracks";

if ($result = $conn->query($sqlAlbum)) {
    $albumCount = $result->fetch_assoc()['total'];
}

if ($result = $conn->query($sqlArtist)) {
    $artistCount = $result->fetch_assoc()['total'];
}

if ($result = $conn->query($sqlTrack)) {
    $trackCount = $result->fetch_assoc()['total'];
}



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>