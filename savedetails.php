<?php
 session_start();

   if (isset($_SESSION['title'], $_SESSION['description'], $_SESSION['video_name']))

   {
  // Movie details from the session
  $title = $_SESSION['title'];
  $description = $_SESSION['description'];
  $price = $_SESSION['price'];
  $video_name = $_SESSION['video_name'];


  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "flixmovies";
  // Connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  // SQL query to insert data into the database
  $sql = "INSERT INTO movies (title, description, price, video_name) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssis", $title, $description, $price,  $video_name );

        if($stmt->execute()){
           // Redirect to index.php after successful database insert
        header("Location: index.php");
        exit();
        } else{
          echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $stmt->close();

        session_unset();
        session_destroy();

      } else{
        header("Location: admin.php");
        exit();

      }

?>