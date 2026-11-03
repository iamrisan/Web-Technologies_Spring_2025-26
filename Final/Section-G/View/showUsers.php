<?php 
include "../Model/DatabaseConnection.php";
?>

<html>

<body>

<p>Here, we are going to show all users list</p>

<?php 

$db = new DatabaseConnection();
$connection = $db->openConnection();
$response = $db->allUsers($connection, "users");
  
if($response){
     while($row = $response->fetch_assoc()){
        $image =$row["image_path"];
        echo "ID: ".$row["id"];
        echo "<br/> Username".$row["username"];
        echo "<br/>".$row["password"];
        echo "<br/> <img src='$image' width='20px' height='20px'/>";
     }
}

?>

</body>
</html>