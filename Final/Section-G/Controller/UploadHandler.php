
<?php 

$uploadFile = $_FILES["fileupload"];

if($uploadFile){
    $uploadDirectory = "../uploads/";
    $path = $uploadDirectory . basename($uploadFile["name"]);
    echo "Upload Directory: ".$uploadDirectory;
    echo "<br/>Upload File Path: ".$path;

    $response = move_uploaded_file($uploadFile["tmp_name"], $path);
    echo "<br/>Uploaded response: ".$response;

    if($response){

    }
}

?>

<html>
    <body>
        <img src="<?php echo $path;?>" height="200px" width="200px"/>
    </body>
</html>