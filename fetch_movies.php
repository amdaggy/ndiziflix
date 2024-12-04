<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Database connection details
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "flixmovies";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ')' . $conn->connect_error);
}

// Retrieve video details from the database
$sql = "SELECT id, title, description, price, video_name FROM movies";
$result = $conn->query($sql);

// Display videos
if ($result->num_rows > 0) {
    echo '<div class="video-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="video-item">';
        echo '<div class="video-overlay">';
        echo '<p>Unlock the video by making a purchase</p>';
        echo '</div>';
        echo '<video width="400">';
        echo '<source src="uploads/' . str_replace(' ', '%20', $row['video_name']) . '" type="video/mp4">';
        echo 'Your browser does not support the video tag.';
        echo '</video>';
        echo '<div class="video-details">';
        echo '<h3>' . $row['title'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<button class="addCart" data-id="' . $row['id'] . '" data-title="' . $row['title'] . '" data-price="' . $row['price'] . '">Add to Cart</button>';
        echo '<form action="purchase.php" method="post">';
        echo '<input type="hidden" name="video_id" value="' . $row['id'] . '">';
        echo '<label for="phone">Phone Number:</label>';
        echo '<input type="tel" id="phone" name="phone" required>';
        echo '<button type="submit" name="submit">Buy Now: Ksh' . $row['price'] . '</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No movies available.</p>';
}

$conn->close();
?>
