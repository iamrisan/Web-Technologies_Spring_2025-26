<?php 
session_start();

$usernameError = $_SESSION["usernameError"] ?? "";
$passwordError = $_SESSION["passwordError"] ?? "";
$loginError = $_SESSION["credentialError"] ?? "";

$username = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if($isLoggedIn){
    Header("Location: dashboard.php");
    exit();
}


unset($_SESSION["usernameError"]);
unset($_SESSION["passwordError"]);
unset($_SESSION["username"]);
unset($_SESSION["credentialError"]);

?>

<html>
    <head>
        <script src="../Controller/JS/checkEmail.js"></script>
    </head>
<body>
<form method="post" action="../Controller/registrationValidation.php" enctype="multipart/form-data">
<table>
    <tr>
        <td>Username</td>
        <td><input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo $username;?>" onkeyup="checkEmail()"/></td>
        <td style="color:red">
            <?php echo "$usernameError"; ?>
            <p id="usernameError"></p>
        </td>
    </tr>
     <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="Enter Password"/></td>
        <td style="color:red"><?php echo "$passwordError"; ?></td>
    </tr>
    <tr>
        <td>Upload File:</td>
        <td>
             
        <input type="file" name="fileupload"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><p style="color:red"><?php echo $loginError;?></p></td>
    </tr>

         <tr>
        <td></td>
        <td>Already have an account? <a href='login.php'>Click Here</a> To login</td>
     
    </tr>

     <tr>
        <td></td>
        <td><button type="submit" >Registration</button></td>
    </tr>
</table>
</form>
</body>
</html>