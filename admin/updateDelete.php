<?php
// Function to delete a video from the database
function deleteVideo($video_id, $conn) {
    $video_id = mysqli_real_escape_string($conn, $video_id); // Sanitize input

    // Construct and execute the delete query
    $query = "DELETE FROM videos WHERE video_id = '$video_id'";
    if(mysqli_query($conn, $query)) {
        // Deleted successfully
        echo "Video deleted successfully.";
    } else {
        // Error occurred
        echo "Error deleting video: " . mysqli_error($conn);
    }
}

// Function to edit the status of a video and provide feedback
function editVideoStatus($video_id, $status, $feedback, $conn) {
    $video_id = mysqli_real_escape_string($conn, $video_id); // Sanitize input
    $status = mysqli_real_escape_string($conn, $status); // Sanitize input
    $feedback = mysqli_real_escape_string($conn, $feedback); // Sanitize input

    // Construct and execute the update query
    $query = "UPDATE videos SET status = '$status', feedback = '$feedback' WHERE video_id = '$video_id'";
    if(mysqli_query($conn, $query)) {
        // Updated successfully
        echo "Video status updated successfully.";
    } else {
        // Error occurred
        echo "Error updating video status: " . mysqli_error($conn);
    }
}
?>
