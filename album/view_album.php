<?php
include "helper/view_helper.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($album['Title']) ?> - Album Details</title>
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

                    <!-- Include components for viewing an album -->
                    <?php include 'component/view/back_button.php'; ?>

                    <!-- Include album header with title and artist -->
                    <?php include 'component/view/album_header.php'; ?>

                    <!-- Include stats cards for album details -->
                    <?php include 'component/view/stats_cards.php'; ?>

                    <!-- Include tracks table for displaying album tracks -->
                    <?php include 'component/view/tracks_table.php'; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript for sidebar functionality -->
    <script src="../sidebar/sidebar.js"></script>
</body>

</html>
<?php
$stmtTracks->close();
$conn->close();
?>