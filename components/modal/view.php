<?php
if(!empty($_GET['id']) && !empty($_GET['titulo'])){
    //DB details
    require '../db/conexion.php';   
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    if (isset($_GET["titulo"])) {
        $titulo = $_GET["titulo"]; // Accede a la variable enviada desde JavaScript    
        $titulo = strip_tags($titulo); // Elimina las etiquetas HTML y PHP
        $titulo = trim($titulo); // Elimina los espacios en blanco al principio y al final
    
        // Determina qué consulta SQL ejecutar en función del título
        switch ($titulo) {
            case 'Parques':
                $result = $db->query("SELECT imagen FROM parques WHERE id = {$_GET['id']}");
                break;
            case 'Iglesias':
                $result = $db->query("SELECT imagen FROM iglesias WHERE id = {$_GET['id']}");
                break;
            case 'Museos':
                $result = $db->query("SELECT imagen FROM museos WHERE id = {$_GET['id']}");
                break;
            case 'Restaurantes':
                $result = $db->query("SELECT imagen FROM restaurantes WHERE id = {$_GET['id']}");
                break;
            default:
                echo "Título no reconocido.";
                exit(); // Termina el script si el título no es reconocido
        }
    }
    
    
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
            case IMAGETYPE_JPX:
                header("Content-type: image/jpg");
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