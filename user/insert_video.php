<?php
include("crud_functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = "pending";

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_formats = array("video/mp4", "video/avi", "video/quicktime", "video/3gpp", "video/mpeg");
    if (!in_array($_FILES["video"]["type"], $allowed_formats)) {
        echo "Sorry, only MP4, AVI, MOV, 3GP, and MPEG files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (max 500MB)
    if ($_FILES["video"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            // Generate a thumbnail
            $thumbnail_path = generate_thumbnail($target_file);

            // Insert video information into the database
            insert_video($title, $target_file, $description, $thumbnail_path, $status);
            header("Location: Upload.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
