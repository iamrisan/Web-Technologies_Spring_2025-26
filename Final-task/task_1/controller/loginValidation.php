<?php
session_start();
$username= $_POST["username"];
$password= $_POST["password"];

//$username= $_REQUEST["username"];
//$username= $_GET["username"];


$hasUsernameError= true;
$hasPasswordError= true;
echo "<h2>Hello Mr, $username</h2>";
echo "<h3>we know your password... $password, right? </h3>";

if(!$username){
    $_SESSION["usernameErr"]="Username is required";
    $hasUsernameError = true;

}else{
    unset($_SESSION["usernameErr"]);
    $hasUsernameError=false;
}

if(!$password){
    $_SESSION["passwordErr"]="Password is required";
    $hasPasswordError = true;

}else{
    unset($_SESSION["passwordErr"]);
    $hasPasswordError=false;
}

if($hasUsernameError || $hasPasswordError){
    Header("Location: ../View/login.php");
}else{
    
}


?>