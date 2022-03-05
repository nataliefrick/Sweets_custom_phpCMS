<?php 
$page_title = "Register User";
include("incl/header.php"); 

if(!isset($_POST['username'])) // if a username has not been used to login
{
    header("location: login.php"); // load login_form.php
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // create new instance of the user class (a new user object)
    $user = new User();

    // checks to see if username and password are filled in 
    if($user->setUsername($username) && $user->setPassword($password)){
        // if they hold string values, true is returned

        // check to see if credentials are on list
        if($user->addUser()) { 
            // returned value 'true', user is now registered
            $_SESSION['msg'] = "'" . $username . "', you are now registered. Please login";
            header("location: login.php"); // load login_form.php
        } else { // if 'false' write out error msg 
            $_SESSION['msg'] = "'The username " . $username . "' already exists, please try again.";
            header("location: login.php"); // load login_form.php
        }

    } else { // write out error msg 
        $_SESSION['msg'] = "Please log in with your username and password.";
        header("location: login.php");
    }
}

?>