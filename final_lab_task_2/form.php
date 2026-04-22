<?php 
session_start();
$username = $_SESSION["username"] ?? "";

$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if(!$isLoggedIn){
    Header("Location: login.php");
    exit();
}

$isCookieFound = isset($_COOKIE["fav_food"]);

$selectedFood = $_COOKIE["fav_food"] ?? "";



?>

<html>
    <body>
        <h1>Hello, Mr <?php echo $username; ?></h1>
        <h3>Welcome to Dashboard</h3>
        <a href="../Controller/logout.php">Logout</a>
    </body>

    <?php 
    if($isCookieFound){
    echo "<div>
        <p>Hi, We know your favorite food, <strong>$selectedFood</strong>.</p>
        <p>Click <a href='../Controller/deleteCookie.php'>Here</a> to delete cookie</p>
    </div>";
    } else{
    echo "<form method='post' action='../Controller/setFavoriteFoodHandler.php'>
        <label>What is your favorite food? </label>
        <input type='text' name='favoriteFood' placeholder='Enter your favorite food'/>
        <input type='submit' name='submit'/>
    </form>";
    }

    ?>

   

    
</html>