<?php declare(strict_types=1);
include "helper/read_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums - Chinook Music Manager</title>
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

                <!-- Include components for reading albums -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <!-- Include header and success message -->
                    <?php include 'component/read/header.php'; ?>

                    <!-- Include success message if applicable -->
                    <?php include 'component/read/success_message.php'; ?>

                    <!-- Include stats cards, search form, and table -->
                    <?php include 'component/read/stats_cards.php'; ?>

                    <!-- Include search form and table for displaying albums -->
                    <?php include 'component/read/search_form.php'; ?>

                    <!-- Include the table for displaying albums and pagination -->
                    <?php include 'component/read/table.php'; ?>

                    <!-- Include pagination for navigating through album pages -->
                    <?php include 'component/read/pagination.php'; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript for sidebar functionality -->
    <script src="../sidebar/sidebar.js"></script>

    <!-- JavaScript for album reading functionalities -->
    <script src="helper/read.js"></script>
</body>

</html>