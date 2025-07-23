<?php
include "helper/update_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Album - Chinook Music Manager</title>
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

                    <!-- Include components for updating an album -->
                    <?php include 'component/update/alerts.php'; ?>

                    <!-- Include the album update form -->
                    <?php include 'component/update/info_card.php'; ?>

                    <!-- Include the form for updating album details -->
                    <?php include 'component/update/form.php'; ?>

                    <!-- Include warning card for unsaved changes -->
                    <?php include 'component/update/warning_card.php'; ?>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript for sidebar functionality -->
    <script src="../../sidebar/sidebar.js"></script>

    <!-- JavaScript for album update functionalities -->
    <script src="helper/update.js"></script>
</body>

</html>