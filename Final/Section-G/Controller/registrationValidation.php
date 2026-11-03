<?php 
include "../Model/DatabaseConnection.php";

session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$uploadFile = $_FILES["fileupload"];

echo "<h1>Hi, Mr $username</h1>";
echo "<h1>Hi, Mr ".$username."</h1>";
echo "<h2>Here is your password..$password</h2>";

$hasUsernameError = true;
$hasPasswordError = true;

if(!$username){
    $_SESSION["usernameError"] = "Username is required";
    $hasUsernameError = true;
}else{
    unset($_SESSION["usernameError"]);
    $hasUsernameError = false;
}

if(!$password){
    $_SESSION["passwordError"] = "Password is required";
    $hasPasswordError = true;
}else{
    unset($_SESSION["passwordError"]);
    $hasPasswordError = false;
}

if($hasUsernameError || $hasPasswordError){
    $_SESSION["username"] = $username;
    Header("Location: ../View/login.php");
}else{
    $path = "";
    if($uploadFile){
    $uploadDirectory = "../uploads/";
    $path = $uploadDirectory . basename($uploadFile["name"]);
    echo "Upload Directory: ".$uploadDirectory;
    echo "<br/>Upload File Path: ".$path;

    $response = move_uploaded_file($uploadFile["tmp_name"], $path);
    echo "<br/>Uploaded response: ".$response;
}
// DB Work here
$db = new DatabaseConnection();
$connection = $db->openConnection();
$response = $db->signUp($connection, "users", $username, $password, $path);
    if($response){
        Header("Location: ../View/login.php");
    }
}
?>