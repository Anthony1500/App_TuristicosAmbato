<?php
if(!empty($_GET['id'])){
    //DB details
    require '../db/conexion.php';   
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    $result = $db->query("SELECT imagen FROM parques WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Get the image type
        $info = getimagesizefromstring($imgData['imagen']);

        //Render image
        switch ($info[2]) {
            case IMAGETYPE_JPEG:
                header("Content-type: image/jpeg");
                break;
            case IMAGETYPE_PNG:
                header("Content-type: image/png");
                break;
            default:
                echo 'Tipo de imagen no soportado.';
                exit;
        }
        
        echo $imgData['imagen']; 
    }else{
        echo 'Imagen no encontrada...';
    }
}
?>