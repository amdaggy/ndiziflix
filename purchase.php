<?php
session_start();

include "php_daraja/stkpush.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Replace with your database connection details
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "flixmovies";

    // Create a connection to the database
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve user input from the form
    $phone = $_POST['phone'];
    $videoId = $_POST['video_id']; // Assuming 'id' is the primary key for the video
    $amount = "1";

    // Run the stk push function
    $response = initiateSTKPush($amount, $phone);

    // Debugging: Print STK push response
    // var_dump($response);

    // Decode the JSON response if it's a string
    if (is_string($response)) {
        $response = json_decode($response, true);
    }
    

    if ($response['ResponseCode'] == "0") {

        // Insert purchase information into the database
        $sql = "INSERT INTO purchases (video_id, video_name, phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $videoId, $title, $phone);

        if ($stmt->execute()) {
            // Redirect the user to video_display.php with the video ID
            sleep(15);
            header("Location: video_display.php?id=" . $videoId);
            // echo $response;
            exit(); // You can customize this message or redirect the user to a success page
        } else {
            header("Location: video_display.php?id=" . $videoId);
        }
    }
    else {
        // Stk push failed
         echo "STK push failed. Please try again.";
        header("Location: video_display.php?id=" . $videoId);
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect to the homepage or handle accordingly
    header("Location: video_display.php?id=" . $videoId);
    exit();
}
?>
