<?php 
session_start();
$username = $_SESSION["username"] ?? "";
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;
if(!$isLoggedIn){
    Header("Location: login.php");
    exit();
}

$image_path = $_SESSION["image_path"] ??"";

$isCookieSet = isset($_COOKIE["favoriteFood"]);
$favFood = '';
if($isCookieSet){
    $favFood = $_COOKIE["favoriteFood"];
}

?>

<html>
    <body>
        <h1>Greetings! Welcome to Dashboard <strong><?php echo $username;?></strong></h1>
        <img src="<?php echo $image_path;?>" height="200px" width="200px"/>
        <a href="../Controller/logout.php">Logout</a>


        <div>
            <?php 
            if(!$isCookieSet){
                echo "<div style='margin-top: 20px;'>
                <form method='post' action='../Controller/handleCookie.php'>
                    <label >Favorite Food: </label>
                    <input type='text' name='favFood' placeholder='Enter your favorite Food'/>
                    <input type='submit' name='submit'/>
                </form>
            </div>";
            }else{
            echo "<div>
                <p>Hi $username, We know your favorite food.</p>
                <p>Your favorite food is $favFood</p>
                <form method='post' action='../Controller/deleteCookie.php'>
                    <button type='submit'>Delete Cookies</button>
                </form>
            </div>";
            }
            
            
            ?>
           
        </div>

        
    </body>
</html>