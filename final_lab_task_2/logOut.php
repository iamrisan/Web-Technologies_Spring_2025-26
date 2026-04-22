<?php 
session_start();
// unset($_SESSION["username"]);
// unset($_SESSION["isLoggedIn"]);
session_destroy();
Header("Location: ../View/login.php");
exit();
?>