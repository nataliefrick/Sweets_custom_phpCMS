<?php 
include_once("incl/config.php"); 
?>
<!DOCTYPE html>
<html lang="se">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Style Sheets -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?= $page_title . $divider . $site_title; ?></title>
</head>
<body>
    <?php
        $user = new User();
        if($user->isLoggedIn()) {    ?>
            <section id="toolbar">
                <ul class="nobullets flex end">
                <li class="welcomemsg">Welcome, <?= ucwords($_SESSION['username']) ?></li>
                <li><a class="u-link" href="logout.php">Logout</a></li>
                <li><a class="u-link" href="admin.php">Dashboard</a></li></ul>
            </section>
    <?php } ?>
    <header> 

    <a class="noline" href="index.php"><h1>SWEETS</h1></a>
        <?php include("incl/navbar.php"); ?>
    </header>
