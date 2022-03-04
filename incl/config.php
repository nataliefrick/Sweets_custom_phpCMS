<?php
    $site_title = "Sweets";
    $divider = " | ";

    // Aktivera felrapportering
    // error_reporting(-1);
    // ini_set("display_errors", 1);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    // Auto including of classes'
    spl_autoload_register(function ($class_name) {
        include 'classes/' . $class_name . '.class.php';
    });

    // start session
    session_start();

    // developer mode
    $devmode = true;

    if($devmode) {
        // activate error reporting
        error_reporting(-1);
        ini_set("display_errors", 1);

        // database settings - local
        define("DBHOST", "localhost");
        define("DBUSER", "sweets");
        define("DBPASS", "sweets");
        define("DBDATABASE", "sweets");
    } else {
        // database settings - published  ---->> change to false devmode!!!!
        //define("DBHOST", "localhost");
        //define("DBUSER", "nataliesal_blogdb");
        //define("DBPASS", "an5Y!Pth4866");
        //define("DBDATABASE", "nataliesal_blogdb");
    }