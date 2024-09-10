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