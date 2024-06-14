<?php
include('db.php');
include('header.php');
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/tables.css">
    <style>
        .custom-size {
            width: 50px;
            height: auto;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <main class="main-container">
        <img src="arrowback.png" alt="" class="custom-size" onclick="location.href='adminpage.php'">
        <div class="main-title">
            <h2>APPROVED FILES</h2>
        </div>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Description</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM videos WHERE status = 'approved'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='files'><div class='files-desc'><h5>" . htmlspecialchars($row['title']) . "</h5></div></td>";
                            echo "<td class='file-uploader'><h4>" . htmlspecialchars($row['description']) . "</h4></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No approved videos found</td></tr>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
