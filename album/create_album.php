<?php
// Include the helper file for album creation functionalities
include "helper/create_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album - Chinook Music Manager</title>
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


                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-white">Add New Album</h1>
                                <p class="mt-2 text-secondary">Create a new album entry in your music collection</p>
                            </div>
                            <a href="read_album.php" class="btn-secondary text-white px-6 py-3 font-medium">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Back to Albums
                            </a>
                        </div>
                    </div>

                    <!-- Include components for creating an album -->
                    <?php include 'component/create/album_errors.php'; ?>

                    <!-- Include the album creation form -->
                    <?php include 'component/create/album_form.php'; ?>

                    <!-- Include tips or instructions for the user -->
                    <?php include 'component/create/tips_card.php'; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript for sidebar functionality -->
    <script src="../../sidebar/sidebar.js"></script>

    <!-- JavaScript for album creation functionalities -->
    <script src="helper/create.js"></script>
</body>

</html>