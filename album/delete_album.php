<?php
// Include the helper file for album deletion functionalities
include "helper/delete_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Album - Chinook Music Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                    <!-- Include components for deleting an album -->
                    <?php include 'component/delete/header.php'; ?>

                    <!-- Include alert component for success/error messages -->
                    <?php include 'component/delete/confirm_card.php'; ?>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript for sidebar functionality -->
    <script src="../sidebar/sidebar.js"></script>

    <!-- Confirmation script for album deletion -->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this album and all its tracks? This action cannot be undone.");
        }
    </script>
</body>

</html>