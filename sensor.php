<!DOCTYPE html>
<html>
<head>
    <title>Add Sensor Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php include 'navbar.php'; ?>

        <h1>Add Sensor Data</h1>

        <form class="sensor-form" method="post" action="">
            <label for="room">Room:</label>
            <input type="text" name="room" required><br>

            <label for="temperature">Temperature:</label>
            <input type="number" name="temperature" required><br>

            <label for="humidity">Humidity:</label>
            <input type="number" name="humidity" required><br>

            <label for="noise_level">Noise Level:</label>
            <input type="number" name="noise_level" required><br>

            <button type="submit">Add Data</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = $_POST['room'];
            $temperature = $_POST['temperature'];
            $humidity = $_POST['humidity'];
            $noise_level = $_POST['noise_level'];

            // Connect to the SQLite database
            $db = new SQLite3('superklima.db');

            // Prepare the SQL statement to insert data
            $stmt = $db->prepare("INSERT INTO sensor_data (room, temperature, humidity, noise_level) VALUES (?, ?, ?, ?)");

            // Bind the values to the statement
            $stmt->bindValue(1, $room, SQLITE3_TEXT);
            $stmt->bindValue(2, $temperature, SQLITE3_FLOAT);
            $stmt->bindValue(3, $humidity, SQLITE3_FLOAT);
            $stmt->bindValue(4, $noise_level, SQLITE3_FLOAT);

            // Execute the statement
            $stmt->execute();

            echo "Data added successfully!";
        }
        ?>
    </div>
</body>
</html>