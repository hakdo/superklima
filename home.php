<!DOCTYPE html>
<html>
  <?php session_start(); ?>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <?php include 'navbar.php'; ?>
    <svg width="600" height="400" xmlns="http://www.w3.org/2000/svg">
  <!-- Corridor -->
  <rect x="50" y="150" width="500" height="50" fill="lightgray" stroke="black" />
  <text x="275" y="180" font-family="Arial" font-size="14" fill="black">Corridor</text>

  <!-- Board Room -->
  <rect x="450" y="50" width="100" height="100" fill="lightblue" stroke="black" />
  <text x="475" y="100" font-family="Arial" font-size="14" fill="black">Board Room</text>

  <!-- Meeting Rooms -->
  <rect x="50" y="200" width="200" height="100" fill="lightgreen" stroke="black" />
  <text x="125" y="250" font-family="Arial" font-size="14" fill="black">Meeting Room</text>
  <rect x="250" y="200" width="200" height="100" fill="lightgreen" stroke="black" />
  <text x="325" y="250" font-family="Arial" font-size="14" fill="black">Meeting Room</text>

  <!-- Rooms above the Corridor -->
  <rect x="50" y="50" width="100" height="100" fill="lightcoral" stroke="black" />
  <text x="75" y="100" font-family="Arial" font-size="14" fill="black">Room 1</text>
  <rect x="150" y="50" width="150" height="100" fill="lightcoral" stroke="black" />
  <text x="200" y="100" font-family="Arial" font-size="14" fill="black">Room 2</text>
  <rect x="300" y="50" width="150" height="100" fill="lightcoral" stroke="black" />
  <text x="350" y="100" font-family="Arial" font-size="14" fill="black">Room 3</text>
</svg>

    <?php if (!isset($_SESSION['username'])) : ?>
      <h1>Please log in to view this page</h1>
      <p>
        You need to be logged in to access the dashboard features. Click the
        button below to log in.
      </p>
      <a href="login.php" class="login-button">Login</a>
    <?php else : ?>
      <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
      <?php
        // Check if the user is authenticated and an admin
        if ($_SESSION['is_admin']) {
            echo "<a href='admin.php'>Admin dashboard</a>";
        }

        // If the user is an admin, display the admin dashboard content
        ?>
      <div class="dashboard">
        <h2>Temperature and Humidity</h2>
        <div class="chart-container">
          <canvas id="temperatureChart"></canvas>
        </div>
        <div class="chart-container">
          <canvas id="humidityChart"></canvas>
        </div>
        <table class="data-table">
          <thead>
            <tr>
              <th>Room</th>
              <th>Temperature (°C)</th>
              <th>Humidity (%)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Room 1</td>
              <td>22</td>
              <td>45</td>
            </tr>
            <tr>
              <td>Room 2</td>
              <td>20</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Room 3</td>
              <td>23</td>
              <td>40</td>
            </tr>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

    <script>
      // Sample data for temperature and humidity
      const temperatureData = [22, 20, 23];
      const humidityData = [45, 50, 40];

      // Create temperature chart
      const temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
      const temperatureChart = new Chart(temperatureCtx, {
        type: 'line',
        data: {
          labels: ['Room 1', 'Room 2', 'Room 3'],
          datasets: [{
            label: 'Temperature',
            data: temperatureData,
            borderColor: 'blue',
            fill: false
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Temperature by Room'
          }
        }
      });

      // Create humidity chart
      const humidityCtx = document.getElementById('humidityChart').getContext('2d');
      const humidityChart = new Chart(humidityCtx, {
        type: 'bar',
        data: {
          labels: ['Room 1', 'Room 2', 'Room 3'],
          datasets: [{
            label: 'Humidity',
            data: humidityData,
            backgroundColor: 'green',
            borderColor: 'green'
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Humidity by Room'
          }
        }
      });
    </script>
  </body>
</html>