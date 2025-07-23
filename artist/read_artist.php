<?php
include "helper/read_artist_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists - Chinook Music Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../index.css">
</head>

<body class="text-white">
    <div class="flex">
        <!-- Including the sidebar layout -->
        <?php include '../sidebar/sidebar.php'; ?>

        <!-- Main content area -->
        <main class="flex-1 main-content">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <!-- Include components for reading artists -->
                    <?php include 'component/read/header.php'; ?>

                    <!-- Include alert component for success/error messages -->
                    <?php include 'component/read/success.php'; ?>

                    <!-- Include the artist statistics, search form, and table -->
                    <?php include 'component/read/stats.php'; ?>

                    <!-- Include the search form and artist table -->
                    <?php include 'component/read/search_form.php'; ?>

                    <!-- Include the artist table and pagination -->
                    <?php include 'component/read/table.php'; ?>

                    <!-- Include pagination for navigating through artist pages -->
                    <?php include 'component/read/pagination.php'; ?>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript for handling artist reading functionalities -->
    <script src="helper/read.js"></script>

    <!-- JavaScript for sidebar functionality -->
    <script src="../sidebar/sidebar.js"></script>
</body>

</html>