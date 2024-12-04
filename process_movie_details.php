<?php
session_start();

$_SESSION['title'] = $_POST['title'];
$_SESSION['description'] = $_POST['description'];
$_SESSION['price'] = $_POST['price'];

header("Location: admin_upload_2.php");  // Redirect to the next form
?>
