<?php
session_start();
$usernameError =$_SESSION["usernameErr"] ?? "";
$passwordError =$_SESSION["passwordErr"] ?? "";
unset($_SESSION["usernameErr"]);
unset($_SESSION["passwordErr"]);

?>
<!doctype html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="post" action="../Controller/loginValidation.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="enter username"/></td>
                    <td><p style='color:red;'><?php echo "$usernameError"; ?></p></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" placeholder="enter password"/></td>
                    <td><p style='color:red;'><?php echo "$passwordError"; ?></p></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit"/></td>
                </tr>    
            </table>
        </form>
    </body>
</html>