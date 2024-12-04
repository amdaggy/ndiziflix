

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Admin - Upload Movie</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
   
</head>
<body>
<section class= "side">
       <img src="./images/background5.jpg" alt=""> 

    </section>
    <section class="main">
    <div class="login-container">
        <p class="title">Upload Movie Details</p>
        <div class="separator"></div>
        <p class="welcome-message">Please provide movie details</p>
        <!-- Form 1: Movie Details -->
        <form class="login-form" action="process_movie_details.php" method="post">
            <div class="form-group">
                <!--<label for="title">Movie Title:</label>-->
                <input type="text" placeholder="name" id="title" name="title" required>
            </div>
            <div class="form-group">
                <!--<label for="description">Movie Description:</label>-->
                <textarea placeholder="movie description" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <!--<label for="price">Price:</label>-->
                <input placeholder="price" type="number" id="price" name="price" required>
            </div>
            <button type="submit">Next</button>
        </form>
    </div>
    </section>
</body>
</html>


