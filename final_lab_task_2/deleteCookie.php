<?php 

setcookie("fav_food", "", time()-1, "/");
Header("Location: ../View/dashboard.php");

?>