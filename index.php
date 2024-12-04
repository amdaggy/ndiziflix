<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlixMovies - Home</title>
    <link rel="stylesheet" type="text/css" href="stylesss.css">
    <!--box icons-->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body class="">
<div class="container">
    <header>
        <a href="#" class="logo"> 
        <i class='bx bxs-movie-play'></i>MOVIES
        </a>
        <p> <h2>Welcome to FlixMovies!</h2> </p>
        <!--<div class="bx bx-menu" id="menu-icons"></div>-->
        <url class="navbar">
            <li><a href="#home" class="home-active" onclick="scrollToTop(); return false;">Home</a></li>
            <!--<li><a href="#movies" >Movies</a></li>-->
            <li><a href="history.php">History</a></li>
            
        </url>
      <!--  <div class="icon-cart">
        <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
</svg>

                <span>0</span>
            </div>-->
            <script>
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
  </script>
    </header>
    <!--<div class="listProduct"></div>-->
        
    <!-- Home-->
    <section class="home swiper" id="home">
    <div class="swiper-wrapper">
      <div class="swiper-slide conatiner">
    <img></img>    
    </div>
      
    </div>
    
    <div class="swiper-pagination"></div>

    </section>

  

      <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


  <!--link to custom js-->

  <script src="main.js"></script>


    <div class="container">
        <p></p>
       <p> <h2>Welcome to FlixMovies!</h2> </p>

         <p><a href="admin.php" class="invoice-button">upload</a></p>
         <div class="container">
   <!-- <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            
        </div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>-->
        <?php
     
error_reporting(E_ALL);
ini_set('display_errors', '1');
         
        // Database connection details
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "flixmovies";
    
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        }
        
        // Retrieve video details from the database
        $sql = "SELECT id, title, description, price, video_name FROM movies";

        $result = $conn->query($sql);
        
        // Display videos
        if ($result->num_rows > 0) {
            echo '<div class="video-container">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="video-item">';
               
                echo '<video width="400" >';
                echo '<source src="uploads/' . str_replace(' ', '%20', $row['video_name']) . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';

                echo '<div class="video-details">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';                
                // Add a form for the user to input their phone number
                echo '<form action="purchase.php" method="post">'; // Submit the form to the same page
                echo '<input type="hidden" name="video_id" value="' . $row['id'] . '">';
                echo '<label for="phone">Phone Number:</label>';
                echo '<input type="tel" id="phone" name="phone" required>';
                echo '<button type="submit" name="submit">Buy Now: Ksh' . $row['price'] . '</button>';
                //echo '<button class="addCart">Add to Cart</button>';

                echo '</form>';

                echo '</div>'; // Close video-details
               
                echo '</div>'; // Close video-item
               
            }
            
            echo '</div>'; // Close video-container
        } else {
            echo '<p>No movies available.</p>';
        }
        // Close the database connection
        $conn->close();
        
        ?> 
      <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">
            
        </div>
        <div class="btn">
            <button class="close">CLOSE</button>
            <button class="checkOut">Check Out</button>
        </div>
    </div>
    
    <script src="ap.js"></script>
    
</body>   
</html>