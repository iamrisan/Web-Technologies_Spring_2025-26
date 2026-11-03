<?php 
include "../Model/DatabaseConnection.php";

$username = $_POST["username"] ?? "";
if(!$username){
    echo "Please provide username";
}else{

    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    
    $result = $db->getExistingUserByUsername($connection, "users", $username);
    if($result->num_rows > 0){
        echo "The username is used";
    }else{
        echo "Username available";
    }
}

?>