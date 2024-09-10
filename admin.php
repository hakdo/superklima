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
        $comparekey = file_get_contents('apikeys.txt');

        // If the user is an admin, display the admin dashboard content
        ?>

        <h1>Welcome, Admin!</h1>
        <p>Your API Key is: 
            <?php echo $comparekey; ?>
        </p>

        </div>
</body>
</html>