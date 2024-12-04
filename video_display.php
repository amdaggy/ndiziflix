<?php
// Database connection details
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "flixmovies";

// Create a connection to the database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve video information from the database based on the video ID
$videoId = $_GET['id']; // Assuming the video ID is passed through URL

// Fetch video URL from the database based on the video ID
// Fetch video URL from the database based on the video ID
$sql = "SELECT video_name FROM movies WHERE id = $videoId"; // Adjust table and column names as per your database schema
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoFileName = $row['video_name'];
    $videoUrl = 'uploads/' . $videoFileName; // Construct the full path to the video file
} else {
    // Handle the case where the video ID is not found in the database
    // For example, display an error message or redirect the user to another page
    echo "Video not found";
    exit();
}



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Video</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #video-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        video {
            width: 80%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video controls autoplay>
            <source src="<?php echo $videoUrl; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        // Function to toggle fullscreen mode
        function toggleFullScreen() {
            var elem = document.getElementById("video-container");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        }

        // Listen for the user's click event to enter fullscreen mode
        document.getElementById("video-container").addEventListener("click", function() {
            toggleFullScreen();
        });
    </script>
</body>
</html>
