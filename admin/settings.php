<?php
    include('db.php');
    include('header.php');
    include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="settings.css">
    </head>
    <body>
        <main class="settings-container">
            <div class="main-title">
                <h2>SETTINGS</h2>
            </div>

            <div class="settings-container">
                <div>
                    <label for="togg-1">
                        <span>Dark Mode</span>
                        <input type="checkbox" id="togg-1">
                        <div class="toggle-container">
                            <span class="toggle"></span>
                            <span class="toggle-c"></span>
                        </div>
                    </label>
                    <div>
                            <h2>Username</h2>
                            <p>admin1</p>
                        </div>

                        <div>
                            <h2>Email</h2>
                            <p>email2</p>
                        </div>
                </div>
            </div>
        </main>
    </body>
</html>