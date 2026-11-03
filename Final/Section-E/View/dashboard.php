<?php 
include "../Model/DatabaseConnection.php";

session_start();
$username = $_SESSION["username"] ?? "";

$image_path = $_SESSION["image_path"] ?? "";

$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if(!$isLoggedIn){
    Header("Location: login.php");
    exit();
}

$isCookieFound = isset($_COOKIE["fav_food"]);

$selectedFood = $_COOKIE["fav_food"] ?? "";

$db = new DatabaseConnection();
$connection = $db->openConnection();

$users = $db->getAllUsers($connection, "users");


?>

<html>
    <head>
        
    </head>
    <body>
        <h1>Hello, Mr <?php echo $username; ?></h1>
        <h3>Welcome to Dashboard</h3>
        <img src="<?php echo $image_path;?>" alt="No Image Found" height="50px" width="50px" style="border-radius: 100%;"/>
        <a href="../Controller/logout.php">Logout</a>
   

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

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Image</th>
        </tr>

        <?php
            while($row = $users->fetch_assoc()){
                $id = $row["id"];
                $username = $row["username"];
                $path = $row["image_path"];
                echo "<tr>
                    <td>$id</td>
                    <td>$username</td>
                    <td> <img src='$path' alt='No Image Found' height='50px' width='50px' style='border-radius: 100%;'/></td>
                
                </tr>";

            }

        ?>


    </table>


    </body> 
</html>