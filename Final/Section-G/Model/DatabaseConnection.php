<?php 

class DatabaseConnection{
    function openConnection(){
        $db_host="localhost";// 127.0.0.1
        $db_user = "root";
        $db_password = "123456"; // "" for all of you
        $db_name = "section_g";

        $connection  = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error){
            die("Failed to connect to database. Please try again later.. Original Error Message ".$connection->connect_error);
        }
        return $connection;
    }

    function signUp($connection, $tableName, $username, $password, $image_path){
        $sql = "INSERT INTO ".$tableName." (username, password, image_path) VALUES ('".$username."', '".$password."', '".$image_path."')";

        $result = $connection->query($sql);
        return $result;
    }

    function signIn($connection, $tableName, $username, $password){
        $sql = "SELECT * FROM ".$tableName." WHERE username='".$username."' AND password='".$password."'";

        $result = $connection->query($sql);
        return $result;
    }


    function allUsers($connection, $tableName){
        $sql = "SELECT * FROM ".$tableName;

        $result = $connection->query($sql);
        return $result;
    }

    function getExistingUserByUsername($connection, $tableName, $username){
        $sql = "SELECT * FROM ".$tableName." WHERE username LIKE '%".$username."%'";
        $result = $connection->query($sql);
        return $result;
    }

    function closeConnection($connection){
        $connection->close();
    }

}

?>