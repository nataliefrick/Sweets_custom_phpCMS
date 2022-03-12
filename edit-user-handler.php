<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();

if(!isset($_POST['name'])) // if a title is not found
{
    header("Location: admin-seeUsers.php"); 
} else {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $avatar = $_POST['avatar'];
}

$user = new User;

$success = true; // if all posted is ok

$_SESSION['msg'] = "";

// check to see if form is filled correctly
if(!$user->setName($name)) {
    $success = false;
    $_SESSION['msg'] .= "Please give a name.";
    header("Location: edit-user.php?id=$id"); 
}

if(!$user->setAvatar($avatar)) {
    $success = false;
    $_SESSION['msg'] .= "Please choose an avatar img from the list of available or upload a new file.";
    header("Location: edit-user.php?id=$id"); 
}


// if form is filled correctly, Success! Add post
if($success) {
    if($user->updateUser($id)) {
        $_SESSION['msg'] .= "Successful update of user.";
        header("Location: admin-seeUsers.php"); 
        //header("Location: admin.php?message=$message");
    } else {
        $_SESSION['msg'] .= "Error when updating user!";
        header("Location: edit-user.php?id=$id"); 
    } 

} else {
    $_SESSION['msg'] .= "The user has not been created. Try again!";
    header("Location: edit-user.php?id=$id"); 
} 
?>