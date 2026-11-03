<?php 

class ManageDatabaseConnection{
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

    function closeConnection($connection){
        $connection->close();
    }

}

?>