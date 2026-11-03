<?php 
// include "../Model/DatabaseConnection.php";
include "../Model/ManageDatabaseConnection.php";
include "../Model/UsersModel.php";

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

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
    // $users = array("rahim"=>"123456", "karim"=>"67890");
    // $isFound = false;
    // foreach($users as $user=>$pass){
    // if($username === $user && $password === $pass){
            // $isFound = true;
            // $_SESSION["username"] = $username;
            // $_SESSION["isLoggedIn"] = true;
            // Header("Location: ../View/dashboard.php");
    //     }
    // }
    // if(!$isFound){
        // $_SESSION["credentialError"] = "Your username or password is incorrect!";
        // Header("Location: ../View/login.php");
    // }

    // DB Work here
$db = new ManageDatabaseConnection();
$users = new UsersModel();

$connection = $db->openConnection();
$response = $users->signInWithSqlInjection($connection, "users", $username, $password);
$db->closeConnection($connection);
if($response->num_rows > 0){
    while($row = $response->fetch_assoc())
        {
        echo "Username: " . $row["username"]. " - image_path: " . $row["image_path"]."<br>";
        $_SESSION["image_path"] = $row["image_path"];
        }

    $isFound = true;
    $_SESSION["username"] = $username;
    $_SESSION["isLoggedIn"] = true;
    Header("Location: ../View/dashboard.php");
}else{
            $_SESSION["credentialError"] = "Your username or password is incorrect!";
        Header("Location: ../View/login.php");
        
}
}
?>