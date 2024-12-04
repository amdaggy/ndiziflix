<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="styl.css">
    <script src="s.js"></script>
</head>
<body>

    <div class="main">
        <div class="navbar">
        
            <div class="icon">
                <h2 class="logo">FLIX MOVIES</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#" onclick="scrollToTop(); return false;">HOME</a></li>
                    
                    <li><a href="#" onclick="scrollService(); return false">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#" onclick="scrollToContact(); return false;" >CONTACT</a></li>
                    <li><a href="team.php" onclick="#"> TEAM </a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>
         

        </div> 
        <div class="content">
            <h1>LATEST & <br><span>MOVIES</span> <br>AND COMEDY</h1>
            <p class="par">Welcome to FlixMovies! <br> Discover the ultimate destination for movie enthusiasts! <br>At FlixMovies, we bring you a curated collection of the latest blockbusters, timeless classics,<br> and indie gems.<br> Whether you're in the mood for heart-pounding action, side-splitting comedy,<br> or a tear-jerking drama,<br> we've got something for everyone. 
                <br> Enjoy seamless browsing through our extensive catalog, <br>featuring detailed descriptions and previews to help you choose your next favorite film.</p>

                

                <div class="form">
                <button onclick="window.location.href = 'signin.php';">LOGIN HERE</button>
                    <p>

Join our community of movie lovers<br> and immerse yourself in the world of cinema.<br> From exclusive releases to special offers, <br>FlixMovies is your go-to hub. <br>Thank you for choosing FlixMovies</p>
<a>Follow us on facebook and youtube</a>
                    <div class="icons">
                        <a href="https://www.facebook.com/ndizitv"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="https://www.youtube.com/@NDIZITV"><ion-icon name="logo-youtube"></ion-icon></a>
                    </div>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <div id="service-section">
      <h2 class="shows-heading" ><u>SERVICES</u></h2>
      <p>Flixmovies is your number one movie sellig site, offering up-to-date news and the best programs ranging from Education, Religious, Political, Health, Agriculture. 
        <p>Flixmovies is the home of the latest comedy clips and drama. Stay tuned for the latest breaking news from Kisii and beyond. </p>
       <p> We are your number one TV platform for comedy, news, and general entertainment. For factual news and programs, keep it Flixmovies. Media & News Company.</p>
    </div>
    <div id="contact-section" class="video-section">
    <h3 class="center-text"><u>Contact Information:</u></h3>
    <p class="center-text">Email: ndizitv@gmail.com</p>
    <p class="center-text">Phone: 0728 429617</p>
  </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <footer>
    <div class="center-text">
      <p class="copyright">
        &copy; 2023 Ndizi Flix. All rights reserved.
      </p>
    </div>
  </footer>
</body>
</html>