<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Movie (Select Video)</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<style>
      body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;

      }
      input{
        font: size 2px;
      }
      .error {
    color: red;
}

      </style>
<body>
   
<section class= "side">
       <img src="./images/background7.jpg" alt=""> 
       </section>
       <section class="main">
    <div class="login-container">
    
        <p>Upload Movie - Select Video</p>
        <div class="separator">
            <p class="welcome-message">select video file</p>
        <!-- Form 2: Movie File Upload -->
        <?php 
   if(isset($_GET['error'])) { ?>
     
     <p class="error"><?=$_GET['error']?></p>
   <?php } 
?>

        <form class="login-form" action="process_movie_upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group"> <input  type="file"
                    name="my_video"></div>
                    <div class="form-group"><input  type="submit"
                    name="submit"
                    value="upload"></div>        
            
        </form>
    </div>
    </section>
</body>
</html>
