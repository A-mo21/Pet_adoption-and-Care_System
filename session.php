<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 


if (isset($_COOKIE['logged_in']) && !isset($_SESSION['logged_in'])) {
    
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['logged_in'] = true;
}
?>
