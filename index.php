<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinook Album Manager</title>

    <!-- Using the tailwindcss  -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Using normal css for sidebar ui  -->
    <link rel="stylesheet" href="index.css">
</head>

<body class="text-white">

    <div class="flex">

        <!-- Include the sidebar navigation component  -->
        <?php include 'sidebar/sidebar.php'; ?>

        <!-- Include the database connection file -->
        <?php
        include 'db.php';
        ?>
        <!-- Calling the dashboard content -->
        <?php include 'dashboard/dashboard.php'; ?>

    </div>

    </div>

    <script src="sidebar/sidebar.js"></script>
</body>

</html>