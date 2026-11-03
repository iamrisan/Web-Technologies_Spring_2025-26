<?php 

class UsersModel{
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


       function signInWithSqlInjection($connection, $tableName, $username, $password){
        $sql = "SELECT * FROM ".$tableName." WHERE username= ? AND password= ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("ss",$username, $password);
        $statement->execute();
        $result = $statement->get_result();
        return $result;
    }


    function allUsers($connection, $tableName){
        $sql = "SELECT * FROM ".$tableName;

        $result = $connection->query($sql);
        return $result;
    }

    function getExistingUserByUsername($connection, $tableName, $username){
        $sql = "SELECT * FROM ".$tableName." WHERE username='".$username."'";
        $result = $connection->query($sql);
        return $result;
    }

}

?>