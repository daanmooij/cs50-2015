<?php
    
    // Makes sure all errors and warnings are displayed
    ini_set("display_errors", true);
    error_reporting(E_ALL);
    
    // Include some files so you can use their contents
    require("constants.php");
    require("functions.php");  
    
    // Start or continue session
    session_start();
    
    // If you are not logged in and you aren't on the login or register page, go there
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/register.php", "/logout.php"])){
        if (empty($_SESSION["id"])){
            redirect("login.php");
        } 
    }
?>
