<?php 

$food = $_POST["favoriteFood"];

setcookie("fav_food", $food, time()+3600, "/");
Header("Location: ../View/dashboard.php");

?>