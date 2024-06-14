<?php
include("crud_functions.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $video = get_video_by_id($id);
    if ($video) {
        $video_path = $video['videos'];
        $thumbnail_path = $video['thumbnail'];

        if (file_exists($video_path)) {
            unlink($video_path);
        }

        if (file_exists($thumbnail_path)) {
            unlink($thumbnail_path);
        }
    }
    
    delete_video($id);
    header("Location: Upload.php");
    exit();
}
?>