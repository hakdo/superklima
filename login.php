<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // Assuming you have a SQLite database connection established
    $db = new SQLite3('superklima.db');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL statement to check if the username and password match
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bindValue(1, $username, SQLITE3_TEXT);
        $stmt->bindValue(2, $password, SQLITE3_TEXT);
        $result = $stmt->execute();

        if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Authentication successful
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $row['is_admin'];
            syslog(LOG_INFO, "User successfully logged in: " . $username);
            header('Location: home.php'); // Redirect to the home page
            exit();
        } else {
            // Authentication failed
            syslog(LOG_NOTICE, "Failed logon event for: " . $username . " with passwd " . $password);
            echo "Invalid username or password.";
        }
    }
    ?>


    <div class="container">
        <?php include 'navbar.php' ?>
        <div class="login-form">
            <h2>Login</h2>
            <form method="post" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

</body>
</html>