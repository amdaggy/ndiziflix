<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // File upload handling
    $targetDir = "uploads/"; // Directory where the files will be stored
    $targetFile = $targetDir . basename($_FILES["movieFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["movieFile"]["size"] > 50000000) { // Adjust the file size limit as needed
        echo "Sorry, the file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "avi") {
        echo "Sorry, only MP4, MKV, and AVI files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the file to the specified directory
        if (move_uploaded_file($_FILES["movieFile"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert data into the database
            // Note: You should use prepared statements to prevent SQL injection
            $conn = new mysqli("localhost", "root", "", "flixmovies");
            if ($conn->connect_error) {
                die("Failed to connect: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO movies (title, description, price, file_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $title, $description, $price, $targetFile);

            if ($stmt->execute()) {
                echo "Movie uploaded successfully.";
            } else {
                echo "Error uploading movie to the database.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
