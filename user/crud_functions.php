<?php
function insert_video($title, $videos, $description, $thumbnail, $status) {
    include("connect.php");
    $stmt = $conn->prepare("INSERT INTO videos (title, videos, description, thumbnail, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $videos, $description, $thumbnail, $status);
    if (!$stmt->execute()) {
        die("Error inserting video: " . $stmt->error);
    }
    $stmt->close();
    $conn->close();
}

function get_all_videos() {
    include("connect.php");
    $result = $conn->query("SELECT * FROM videos");
    $videos = [];
    while ($row = $result->fetch_assoc()) {
        $videos[] = $row;
    }
    $result->free_result();
    $conn->close();
    return $videos;
}

function update_video($id, $title, $videos, $description, $thumbnail) {
    include("connect.php");
    
    if ($videos !== null && $thumbnail !== null) {
        $stmt = $conn->prepare("UPDATE videos SET title=?, videos=?, description=?, thumbnail=? WHERE video_id=?");
        $stmt->bind_param("ssssi", $title, $videos, $description, $thumbnail, $id);
    } elseif ($videos !== null) {
        $stmt = $conn->prepare("UPDATE videos SET title=?, videos=?, description=? WHERE video_id=?");
        $stmt->bind_param("sssi", $title, $videos, $description, $id);
    } elseif ($thumbnail !== null) {
        $stmt = $conn->prepare("UPDATE videos SET title=?, description=?, thumbnail=? WHERE video_id=?");
        $stmt->bind_param("sssi", $title, $description, $thumbnail, $id);
    } else {
        $stmt = $conn->prepare("UPDATE videos SET title=?, description=? WHERE video_id=?");
        $stmt->bind_param("ssi", $title, $description, $id);
    }

    if (!$stmt->execute()) {
        die("Error updating video: " . $stmt->error);
    }
    $stmt->close();
    $conn->close();
}

function delete_video($id) {
    include("connect.php");
    $stmt = $conn->prepare("DELETE FROM videos WHERE video_id = ?");
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        die("Error deleting video: " . $stmt->error);
    }
    $stmt->close();
    $conn->close();
}

function get_video_by_id($id) {
    include("connect.php");
    $stmt = $conn->prepare("SELECT * FROM videos WHERE video_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $video = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $video;
}

function generate_thumbnail($video_path) {
    $thumbnail_path = "path_to_thumbnails/" . basename($video_path, '.' . pathinfo($video_path, PATHINFO_EXTENSION)) . ".jpg";
    $command = "ffmpeg -i $video_path -ss 00:00:01.000 -vframes 1 $thumbnail_path";
    shell_exec($command);
    return $thumbnail_path;
}
?>
