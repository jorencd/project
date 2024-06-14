<?php
function get_all_videos() {
    include("db.php");
    $result = $conn->query("SELECT * FROM videos");
    $videos = [];
    while ($row = $result->fetch_assoc()) {
        $videos[] = $row;
    }
    $result->free_result();
    $conn->close();
    return $videos;
}
?>