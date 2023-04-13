<?php
    session_start(); //inisialisasi session
    
    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
    header("location:/connect-point/api/login_register.php");
    exit;
    
?>