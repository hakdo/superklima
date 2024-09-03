<!DOCTYPE html>
<html>
<head>
    <title>Help</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php session_start(); ?>
</head>
<body>
    <div class="container">
        <?php include 'navbar.php'; ?>
        <h1>How Managing Indoor Climate Helps Stop Climate Change</h1>

        <p>Indoor climate management plays a crucial role in reducing greenhouse gas emissions and mitigating climate change. By optimizing heating, cooling, and ventilation systems, we can significantly decrease energy consumption and reduce our carbon footprint.</p>

        <p>Here's how:</p>

        <ul>
            <li>**Energy Efficiency:** By improving the efficiency of heating and cooling systems, we can reduce the amount of energy needed to maintain comfortable indoor temperatures. This, in turn, decreases greenhouse gas emissions from power plants.</li>
            <li>**Reduced Reliance on Fossil Fuels:** By reducing energy consumption, we decrease our reliance on fossil fuels, such as coal and natural gas, which are major contributors to climate change.</li>
            <li>**Improved Air Quality:** Proper ventilation helps to maintain good indoor air quality, reducing the need for excessive ventilation that can lead to energy loss. This also benefits human health and well-being.</li>
            <li>**Smart Technology:** Implementing smart thermostats and energy-efficient appliances can further optimize indoor climate management and reduce energy consumption.</li>
        </ul>

        <p>By making conscious choices about our indoor climate management, we can contribute to a more sustainable future and help combat climate change.</p>

        <div class="chart-container">
            <canvas id="energySavingsChart"></canvas>
        </div>

        <script>
            // Sample data for energy savings
            const energySavingsData = [20, 15, 18];

            // Create energy savings chart
            const energySavingsCtx = document.getElementById('energySavingsChart').getContext('2d');
            const energySavingsChart = new Chart(energySavingsCtx, {
                type: 'bar',
                data: {
                    labels: ['Heating', 'Cooling', 'Ventilation'],
                    datasets: [{
                        label: 'Energy Savings (%)',
                        data: energySavingsData,
                        backgroundColor: 'green',
                        borderColor: 'green'
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Energy Savings Potential'
                    }
                }
            });
        </script>
    </div>
</body>
</html>