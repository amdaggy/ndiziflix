<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "flixmovies";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    }

    $query = "SELECT username, email, password FROM users WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $dbEmail, $dbPassword);

    if ($stmt->fetch()) {
        if (password_verify($password, $dbPassword)) {
            $_SESSION['username'] = $dbUsername;
            header("Location: index.php"); // Redirect to index.php on success
            exit();
        } else {
            $error_message = "Invalid email or password. Please try again.";
        }
    } else {
        $error_message = "Invalid email or password. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
