<?php
include "helper/update_artist_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artist - Chinook Music Manager</title>
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

                    <!-- Include components for updating an artist -->
                    <?php include 'component/update/header.php'; ?>

                    <!-- Include alert component for success/error messages -->
                    <?php include 'component/update/alert.php'; ?>

                    <!-- Include the artist update form and related components -->
                    <?php include 'component/update/artist_info.php'; ?>

                    <!-- Include the form for updating artist details -->
                    <?php include 'component/update/form.php'; ?>

                    <!-- Include tips or instructions for the user -->
                    <?php include 'component/update/warning.php'; ?>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript for sidebar functionality -->
    <script src="../sidebar/sidebar.js"></script>
</body>

</html>