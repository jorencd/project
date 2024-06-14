<?php
    include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin Dashboard</title>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="grid-container">

            <header class="header">
                <div class="menu-icon" onclick="openSidebar()">
                    <span class="material-icons-outlined">menu</span>
                </div>
                <div class="header-left">
                    <span class="material-icons-outlined">search</span>
                </div>
                <div class="header-right">
                    <span class="material-icons-outlined">notifications</span>
                    <span class="material-icons-outlined">email</span>
                    <span class="material-icons-outlined">account_circle</span>
                </div>
            </header>

            <aside id="sidebar">
                <div class="sidebar-title">
                    <div class="sidebar-brand">
                        <span class="material-icons-outlined">accessibility</span> ADMIN
                    </div>
                    <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
                </div>

                <ul class="sidebar-list">
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">inventory_2</span> Files
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">category</span> Categories
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">groups</span> Customers
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">fact_check</span> Inventory
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">poll</span> Reports
                    </li>
                    <li class="sidebar-list-item">
                        <span class="material-icons-outlined">settings</span> Settings
                    </li>
                </ul>
            </aside>

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
                        <h1>249</h1>
                        <button class="view-button">View</button>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>PROCESSED FILES</h3>
                            <span class="material-icons-outlined">done</span>
                        </div>
                        <h1>50</h1>
                        <button class="view-button">View</button>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>PENDING FILES</h3>
                            <span class="material-icons-outlined">category</span>
                        </div>
                        <h1>100</h1>
                        <button class="view-button">View</button>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <h3>REJECTED FILES</h3>
                            <span class="material-icons-outlined">delete</span>
                        </div>
                        <h1>99</h1>
                        <button class="view-button">View</button>
                    </div>
                </div>

                <div class="charts">
                    <div class="charts-card">
                        <h2 class="chart-title">Overall Files</h2>
                        <div id="bar-chart"></div>
                    </div>

                    <div class="charts-card">
                        <h2 class="chart-title">File Types</h2>
                        <div id="pie-chart"></div>
                    </div>
                </div>

            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.0/apexcharts.min.js"></script>

        <script src="js/scripts.js"></script>
    </body>
</html>