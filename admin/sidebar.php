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

        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">accessibility</span> ADMIN
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item" onclick="location.href='adminpage.php'">
                    <span class="material-icons-outlined">dashboard</span> Dashboard
                </li>
                <li class="sidebar-list-item" onclick="location.href='customers.php'">
                    <span class="material-icons-outlined">groups</span> Customers
                </li>
                <li class="sidebar-list-item" onclick="location.href='feedbacks.php'">
                    <span class="material-icons-outlined">poll</span> Feedbacks
                </li>
                <li class="sidebar-list-item" onclick="location.href='login.php'">
                    <span class="material-icons-outlined">logout</span> Logout
                </li>
            </ul>
        </aside>
    </body>
</html>