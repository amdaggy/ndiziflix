<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <title>Registration</title>
</head>
<body>
    <section class= "side">
       <img src="./images/background1.jpg" alt=""> 

    </section>
<section class="main">
    <div class="login-container">
        <p class="title">Create an Account</p>
        <div class="separator">
            <p class="welcome-message">Provide your details</p>
        <form class="login-form" action="save_user.php" method="post">
            <div class="form-control">
               <!-- <label for="username">Username</label>-->
                <input type="text" placeholder="username" id="username" name="username" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <!--<label for="email">Email</label>-->
                <input type="email" placeholder="email" id="email" name="email" required>
            </div>
            <div class="form-control">
                <div class="form-control">
               <!-- <label for="phone" >Phone Number</label>-->
                <input type="tel" placeholder="phone number" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <!--<label for="password">Password</label>-->
                <input type="password" placeholder="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="form-group">
               <!-- <label for="confirmPassword">Confirm Password</label>-->
                <input type="password" id="confirmPassword" placeholder="confirm password" name="confirmPassword" required>
            </div>
            <button type="submit">Register</button>
            <p>already have an account! <a href="signin.php">Login</a></p>
            </div>

        </form>
    </div>
    <script src="script.js"></script>
    </div>
</section>
</body>
</html>
