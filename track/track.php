<?php
declare(strict_types=1);
require_once "../db.php";
require_once "helper.php";

// Initialize the tracks handler
$tracksHandler = new TracksHandler($conn);
$data = $tracksHandler->handleRequest($_GET);

// Extract data for the view
extract($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks - Chinook Music Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../index.css">
</head>

<body class="text-white">
    <div class="flex">
        <?php include '../sidebar/sidebar.php'; ?>

        <main class="flex-1 main-content">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-white">Tracks</h1>
                        <p class="mt-2 text-secondary">Search by track name, album, composer, or track ID</p>
                    </div>

                    <!-- Stats Cards -->
                    <?php include 'component/stats_cards.php'; ?>

                    <!-- Search and Filter -->
                    <?php include 'component/search_form.php'; ?>

                    <!-- Tracks Table -->
                    <?php include 'component/tracks_table.php'; ?>

                    <!-- Pagination -->
                    <?php include 'component/pagination.php'; ?>
                </div>
            </div>
        </main>
    </div>
    <script src="../sidebar/sidebar.js"></script>
</body>

</html>