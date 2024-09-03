<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <?php session_start() ?>
</head>
<body>
    <div class="container">
        <?php include 'navbar.php'; ?>

        <?php
        // Check if the user is authenticated and an admin
        if (!isset($_SESSION['username']) || !$_SESSION['is_admin']) {
            echo "403 Forbidden: access denied.";
            header('HTTP/1.1 403 Forbidden');
            exit();
        }

        // If the user is an admin, display the admin dashboard content
        ?>

        <h1>Welcome, Admin!</h1>

        </div>
</body>
</html>