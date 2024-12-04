<?php
session_start(); // Start a session to store error messages

$email = $_POST['email'];
$password = $_POST['password'];

// connection
$conn = new mysqli("localhost", "root", "", "flixmovies");
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error); 
  } else 
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        
        // Verify the password using password_verify
        if($data['password'] === $password )  {
            // Login successful, redirect to the index page
            header("Location: index.php");
            exit(); // Make sure to exit after the redirect
        } else {
            $_SESSION['error_message'] = "Invalid Email or password";
            header("Location: signin.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Invalid Email or password";
        header("Location: signin.php");
        exit();
    }
}
?>
