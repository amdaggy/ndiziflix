<?php
session_start(); // Start the session


error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['submit']) && isset($_FILES['my_video']) ){
  
    $video_name = $_FILES['my_video'] ['name'];
    $tmp_name = $_FILES['my_video'] ['tmp_name'];
    $error = $_FILES['my_video'] ['error'];

   

    //  Define allowed video file extensions
    $allowed_extensions = array('mp4', 'avi', 'mov', 'mkv','webm');

    //  Get the file extension of the uploaded video
    $file_extension = strtolower(pathinfo($video_name, PATHINFO_EXTENSION));

    // Check if the file is a video and has a valid extension
    if (!in_array($file_extension, $allowed_extensions)) {
        $error_message = "Invalid file format. Only MP4, AVI, MOV, and MKV files are allowed.";
        header("Location: admin_upload_2.php?error=" . urlencode($error_message));
        exit();
    }

    $video_path='uploads/' .$video_name;


    // Error handling and file existence check for photo
            if (move_uploaded_file($tmp_name, $video_path)) {
                //echo "video moved successfully!";
               

                // Store video_name in the session for later use
        $_SESSION['video_name'] = $video_name;

           //redirect to a new page
           header("Location: savedetails.php");

           exit();

            } else {
                var_dump(error_get_last());
                $error_message = "Error moving video!";
                header("Location: admin_upload_2.php?error=" . urlencode($error_message));
                exit();
               
            }



            
} else{
    $error_message = "Error moving video!";
    header("Location: admin_upload_2.php?error=" . urlencode($error_message));
    exit();
}


    
?>