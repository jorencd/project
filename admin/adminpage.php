<?php
include('db.php');
include('header.php');
include('sidebar.php');

// Fetch overall count of files uploaded
$queryAll = "SELECT COUNT(*) AS total FROM videos";
$resultAll = mysqli_query($conn, $queryAll);
$rowAll = mysqli_fetch_assoc($resultAll);
$totalFiles = $rowAll['total'];

// Fetch count of approved files
$queryApproved = "SELECT COUNT(*) AS total FROM videos WHERE status = 'approved'";
$resultApproved = mysqli_query($conn, $queryApproved);
$rowApproved = mysqli_fetch_assoc($resultApproved);
$approvedFiles = $rowApproved['total'];

// Fetch count of pending files
$queryPending = "SELECT COUNT(*) AS total FROM videos WHERE status = 'pending'";
$resultPending = mysqli_query($conn, $queryPending);
$rowPending = mysqli_fetch_assoc($resultPending);
$pendingFiles = $rowPending['total'];

// Fetch count of rejected files
$queryRejected = "SELECT COUNT(*) AS total FROM videos WHERE status = 'rejected'";
$resultRejected = mysqli_query($conn, $queryRejected);
$rowRejected = mysqli_fetch_assoc($resultRejected);
$rejectedFiles = $rowRejected['total'];

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main class="main-container">
        <div class="main-title">
            <h2>DASHBOARD</h2>
        </div>

        <div class="main-cards">
            <div class="card">
                <div class="card-inner">
                    <h3>ALL FILES</h3>
                    <span class="material-icons-outlined">inventory_2</span>
                </div>
                <h1><?php echo $totalFiles; ?></h1>
                <button class="view-button" onclick="location.href='allfiles.php'">View</button>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>APPROVED FILES</h3>
                    <span class="material-icons-outlined">done</span>
                </div>
                <h1><?php echo $approvedFiles; ?></h1>
                <button class="view-button" onclick="location.href='approvedfiles.php'">View</button>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>PENDING FILES</h3>
                    <span class="material-icons-outlined">category</span>
                </div>
                <h1><?php echo $pendingFiles; ?></h1>
                <button class="view-button" onclick="location.href='pendingfiles.php'">View</button>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>REJECTED FILES</h3>
                    <span class="material-icons-outlined">delete</span>
                </div>
                <h1><?php echo $rejectedFiles; ?></h1>
                <button class="view-button" onclick="location.href='rejectedfiles.php'">View</button>
            </div>
        </div>

        <div class="charts">
            <div class="charts-card">
                <h2 class="chart-title">Overall Files</h2>
                <div id="bar-chart"></div>
            </div>

            <div class="charts-card">
                <h2 class="chart-title">File Status</h2>
                <div id="pie-chart"></div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.0/apexcharts.min.js"></script>
    <script>
        var options = {
            series: [{
                data: [<?php echo $approvedFiles; ?>, <?php echo $pendingFiles; ?>, <?php echo $rejectedFiles; ?>, <?php echo $totalFiles; ?>]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Approved Files', 'Pending Files', 'Rejected Files', 'All Files'],
            }
        };
        var chart = new ApexCharts(document.querySelector("#bar-chart"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [<?php echo $approvedFiles; ?>, <?php echo $pendingFiles; ?>, <?php echo $rejectedFiles; ?>],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Approved Files', 'Pending Files', 'Rejected Files'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
        chart.render();
    </script>
    <script src="js/scripts.js"></script>
</body>
</html>
