<?php
session_start();
session_unset(); 
session_destroy(); 

setcookie("user_id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("logged_in", "", time() - 3600, "/");

header("Location: home.php"); 
exit();
?>
