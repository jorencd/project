<?php
include("content.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .video-thumbnail {
            cursor: pointer;
        }
        .description-column {
            max-width: 200px; 
            max-height: 100px;
            overflow: auto;
            word-wrap: break-word;
        }
    </style>
</head>
<body style="width: 85%; position:absolute; right:0;">
    <div class="container mt-5" style="max-width: 90%;">
        <button style="display: block;" type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addVideoModal">
            Add Video
        </button>
        <h2>List of Videos</h2>
        <?php
        include("crud_functions.php");
        $videos = get_all_videos();
        if (count($videos) > 0) {
            echo "<table class='table table-bordered text-center'>";
            echo "<thead class='thead-dark'>";
            echo "<tr><th>Title</th><th>Video</th><th>Description</th><th>Status</th><th>Actions</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($videos as $video) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($video['title']) . "</td>";

                // Placeholder image instead of thumbnail
                $placeholder_image_path = 'css/pictures/video-91.png';
                $thumbnail_url = $placeholder_image_path;

                echo "<td><img src='$thumbnail_url' class='img-thumbnail video-thumbnail' width='150' height='100' data-toggle='modal' data-target='#videoModal' data-video-path='" . htmlspecialchars($video['videos']) . "'></td>";
                echo "<td class='description-column'>" . htmlspecialchars($video['description']) . "</td>";
                echo "<td>" . htmlspecialchars($video['status']) . "</td>";
                echo "<td>";
                echo "<a href='update_video.php?id=" . $video['video_id'] . "' class='btn btn-warning btn-sm'>Update</a> ";
                echo "<a href='delete_video.php?id=" . $video['video_id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No videos found.</p>";
        }
        ?>

        <div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="addVideoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVideoModalLabel">Add Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_video.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="video">Video File:</label>
                                <input type="file" class="form-control" id="video" name="video" accept="video/*" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Play Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="videoPlayer" class="embed-responsive-item" controls></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#videoModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var videoPath = button.data('video-path');
                var modal = $(this);
                modal.find('.modal-title').text('Play Video');
                modal.find('#videoPlayer').attr('src', videoPath);
            });

            $('#videoModal').on('hidden.bs.modal', function (event) {
                $('#videoPlayer').attr('src', '');
            });

            $('#video').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var video = document.createElement('video');
                    video.preload = 'metadata';
                    video.onloadedmetadata = function() {
                        window.URL.revokeObjectURL(video.src);
                        if (video.duration > 300) {
                            alert('Video length must be less than or equal to 5 minutes.');
                            $('#video').val('');
                        }
                    }
                    video.src = URL.createObjectURL(file);
                }
            });
        });
    </script>
</body>
</html>
