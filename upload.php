<?php
include_once("incl/config.php"); 
$_SESSION['msg'] = "";

if(isset($_POST["submit"])) {
    if(!isset($_FILES["fileToUpload"]["tmp_name"])) // check to see if file selected
    {
        $_SESSION['msg'] .= "Please select a file.";
        header("Location: addrecipe.php"); // load addrecipe.php
        exit;
  } else {
      $target_dir = "img/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $_SESSION['msg'] .= "File is not an image.";
        $uploadOk = 0;
      }


      // Check if file already exists
      if (file_exists($target_file)) {
          $_SESSION['msg'] .= "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size <500KB
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $_SESSION['msg'] .= "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $_SESSION['msg'] .= "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $_SESSION['msg'] .= " Your file was not uploaded.";
        header("Location: addrecipe.php"); // load addrecipe.php
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $_SESSION['msg'] .= " The file <em>". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "</em> has been uploaded.";
          $_SESSION['filename'] = $target_file; // send back file name to link in db
          header("Location: addrecipe.php"); // load addrecipe.php
        } else {
          $_SESSION['msg'] .= " Sorry, there was an error uploading your file.";
          header("Location: addrecipe.php"); // load addrecipe.php
        }
      }
  }
}
?>