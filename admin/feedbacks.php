<?php
include('db.php');
include('header.php');
include('sidebar.php');

// Fetch data from the database
$query = "SELECT title, feedback FROM videos";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Loop through each row
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $feedback = $row['feedback'];

        // Output the HTML template with the fetched data
        echo "
            <dir class='board'>
                <table width='100%'>
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Feedback</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='files'>
                                <img src='' alt=''>
                                <div class='files-desc'>
                                    <h5>$title</h5>
                                </div>
                            </td>
                            <td class='file-uploader'>
                                <h5>$feedback</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </dir>";
    }
} else {
    // No videos found
    echo "No videos found.";
}

// Close the database connection
mysqli_close($conn);
?>
