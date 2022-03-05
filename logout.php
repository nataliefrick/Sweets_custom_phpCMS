<?php 
$user = new User();
$user->logoutUser();
header('location: login.php');