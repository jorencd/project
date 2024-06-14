<?php
include('db.php'); // Database connection file
include('header.php');
include('sidebar.php');
include('updateDelete.php');

// Check if delete action is requested
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $video_id = $_GET['id'];
    deleteVideo($video_id, $conn);
}

// Check if edit action is requested
if (isset($_POST['action']) && $_POST['action'] == 'edit_status' && isset($_POST['id']) && isset($_POST['status'])) {
    $video_id = $_POST['id'];
    $status = $_POST['status'];

    // Check if status is 'Pending', if so, set feedback to empty
    $feedback = ($status == 'Pending') ? '' : $_POST['feedback'];

    editVideoStatus($video_id, $status, $feedback, $conn);
}

// Define the default status filter
$status_filter = isset($_GET['status']) ? $_GET['status'] : 'all';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/allfiles.css">
</head>

<body>
    <main class="main-container">
        <img src="arrowback.png" alt="" class="custom-size" onclick="location.href='adminpage.php'">
        <div class="main-title">
            <h2>ALL FILES</h2>
        </div>

        <!-- Filter options -->
        <div>
            <form method="GET">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" onchange="this.form.submit()">
                    <option value="all" <?php if ($status_filter == 'all') echo 'selected'; ?>>All</option>
                    <option value="pending" <?php if ($status_filter == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="approved" <?php if ($status_filter == 'approved') echo 'selected'; ?>>Approved</option>
                    <option value="rejected" <?php if ($status_filter == 'rejected') echo 'selected'; ?>>Rejected</option>
                </select>
            </form>
        </div>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Video</td>
                        <td>Description</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Adjust the SQL query based on the selected status filter
                    $query = "SELECT * FROM videos";
                    if ($status_filter != 'all') {
                        $query .= " WHERE status = '$status_filter'";
                    }
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='files'><div class='files-desc'><h5>" . htmlspecialchars($row['title']) . "</h5></div></td>";
                            echo "<td class='file-uploader'><video src='" . htmlspecialchars($row['videos']) . "' poster='css/video-91.png' onclick='openVideoModal(\"" . htmlspecialchars($row['videos']) . "\")'></video></td>";
                            echo "<td class='file-uploader'><h4>" . htmlspecialchars($row['description']) . "</h4></td>";
                            echo "<td class='file-status'>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td class='edit'><a href='javascript:void(0);' onclick='openModal(" . htmlspecialchars($row['video_id']) . ")'>Edit</a></td>";
                            echo "<td class='edit'><a href='?action=delete&id=" . htmlspecialchars($row['video_id']) . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No videos found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Video Modal -->
    <div id="videoModal" class="modal" onclick="closeVideoModal(event)">
        <div style="width: 500px; padding:10px;" class="modal-content">
            <span class="close" onclick="closeVideoModal(event)">&times;</span>
            <video style="width: 500px;" controls autoplay></video>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div style="width: 22%;" class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span> <!-- Add the close button -->
            <h2>Edit Video Status</h2>
            <form id="editForm" method="post">
                <input type="hidden" id="editVideoId" name="id">
                <select style="padding: 4px; display:block;" name="status" id="editStatus">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <label style="display: block; margin:10px 0 10px" for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea>
                <input style="display: block; margin:10px 0 10px" type="submit" value="Update">
                <input type="hidden" name="action" value="edit_status">
            </form>
        </div>
    </div>

    <script src="js/allfiles.js"></script>
    <script>
        function openVideoModal(videoSrc) {
            var modal = document.getElementById('videoModal');
            var video = modal.querySelector('video');
            video.src = videoSrc;
            modal.style.display = 'block';
            video.play();
        }

        function closeVideoModal() {
            var modal = document.getElementById('videoModal');
            var video = modal.querySelector('video');
            modal.style.display = 'none';
            video.pause();
            video.currentTime = 0; // Reset video to beginning
        }

        function closeEditModal() {
            var modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }
    </script>
</body>

</html>