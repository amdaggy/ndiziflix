<?php
session_start(); // Start a session to access error messages

// Check if there is an error message in the session
if (isset($_SESSION['error_message'])) {
    // Display the error message
    echo "<div class='form-group error'>{$_SESSION['error_message']}</div>";

    // Unset the error message to clear it after displaying
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <section class="side">
    <img src="./images/background4.jpg" alt=""> 

    </section>
    <section class="main">
    <div class="login-container">
        <p class="title">Sign In</p>
        <div class="separator"></div>
        <p class="welcome-message">Please provide your login credentials</p>
        <form class="login-form" action="login.php" method="post">
            <div class="form-control">
                <!--<label for="email">Email:</label>-->
                <input type="email" placeholder="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <!--<label for="password">Password:</label>-->
                <input type="password" placeholder="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign In</button>
            <p>You have no account! <a href="signup.php">Sign up</a></p>

            <?php
            // Move your error message display code here
            ?>
        </form>
    </section>
    </div>
</body>
</html>
