<?php
// Connect to the SQLite database
$db = new SQLite3('superklima.db');

// Get the room name from the GET parameter
$room = $_GET['room'];

// Construct a vulnerable SQL query without proper sanitization
$query = "SELECT temperature, humidity, timestamp FROM sensor_data WHERE room = '$room'";

// Execute the query
$result = $db->query($query);

// Fetch the results and display them
if ($result) {
    while ($row = $result->fetchArray()) {
        echo "Temperature: " . $row['temperature'] . "<br>";
        echo "Humidity: " . $row['humidity'] . "<br>";
        echo "Timestamp: " . $row['timestamp'] . "<br><br>";
    }
} else {
    echo "No data found for room: " . $room;
}

$db->close();
?>