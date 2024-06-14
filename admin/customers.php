<?php
include('db.php');
include('header.php');
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/tables.css">
</head>
<body>
    <main class="main-container">
        <div class="main-title">
            <h2>CUSTOMERS</h2>
        </div>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Fetch user data from the database
                    $query = "SELECT first_name, last_name, email FROM users";
                    $result = mysqli_query($conn, $query);

                    // Check if any users are found
                    if (mysqli_num_rows($result) > 0) {
                        // Output data for each user
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='files'>";
                            echo "<div class='files-desc'>";
                            echo "<h5>" . htmlspecialchars($row['first_name'] . " " . $row['last_name']) . "</h5>";
                            echo "</div>";
                            echo "</td>";
                            echo "<td class='file-uploader'>";
                            echo "<h5>" . htmlspecialchars($row['email']) . "</h5>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // If no users are found, display a message
                        echo "<tr><td colspan='2'>No users found</td></tr>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
