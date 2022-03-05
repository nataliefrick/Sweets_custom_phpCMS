<?php 
include_once("incl/config.php"); 
if (isset($_SESSION['filename'])) // reset filename holder
    { 
        $_SESSION['filename'] = ""; 
        header("Location: addrecipe.php"); // go back
    }
