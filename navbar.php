<nav>
        <ul>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="home.php">Home</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
            <li><a href="help.php">Help</a></li>
        </ul>
    </nav>