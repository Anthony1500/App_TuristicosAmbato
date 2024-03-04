<?php
/**
 * Este archivo maneja la lógica de mostrar imágenes  
 *
 * PHP version 8
 *
 * @category Images
 * @package  ImagesPackage
 * @author   Your Name <your.email@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.itsbolivar.edu.ec/web/index.php
 */
// Valida que los parámetros "id" y "titulo" no estén vacíos
if (!empty($_GET['id']) && !empty($_GET['titulo'])) {

    // Incluye la conexión a la base de datos
    include '../db/conexion.php';
  
    // Sanitizar la variable "titulo"
    $titulo = strip_tags($_GET['titulo']);
    $titulo = trim($titulo);
  
    
    function prepararConsulta($tabla, $id) { //Función preparar la consulta
        global $db;
        $query = "SELECT imagen FROM $tabla WHERE id = :id";
        $result = $db->prepare($query);
        $result->bindParam(':id', $id);
        return $result;
    }
  
    // Obtener la consulta SQL según el título
    switch ($titulo) {
    case 'Parques':
        $result = prepararConsulta('parques', $_GET['id']);
        break;
    case 'Iglesias':
        $result = prepararConsulta('iglesias', $_GET['id']);
        break;
    case 'Museos':
        $result = prepararConsulta('museos', $_GET['id']);
        break;
    case 'Restaurantes':
        $result = prepararConsulta('restaurantes', $_GET['id']);
        break;
    case 'Eventos Festivos':
        $result = prepararConsulta('eventosfestivos', $_GET['id']);
        break;
    default:
        echo "Título no reconocido.";
        exit();
    }
  
    // Ejecutar la consulta SQL
    try {
       
        $result->execute();
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        exit();
    }
  
    // Obtener la imagen
    $imgData = $result->fetch(PDO::FETCH_ASSOC);
    
    // Si se encontró la imagen, enviarla
    if ($imgData) {
        // Codificar la imagen a base64
        $imgDataEncoded = base64_encode($imgData['imagen']);
    
        // Obtener el tipo de imagen
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $imageType = $finfo->buffer(base64_decode($imgDataEncoded));
    
        // Decodificar la imagen y crear un recurso
        $imagen = imagecreatefromstring(base64_decode($imgDataEncoded));
    
        // Iniciar la captura de salida
        ob_start();
    
        // Generar la imagen y capturar la salida
        switch ($imageType) {
        case 'image/jpeg':
            imagejpeg($imagen);
            break;
        case 'image/png':
            imagepng($imagen);
            break;
        case 'image/gif':
            imagegif($imagen);
            break;
        default:
            echo 'Tipo de imagen no soportado.';
            exit();
        }
    
        // Obtener la imagen generada como una cadena
        $imagenGenerada = ob_get_contents();
    
        // Finalizar la captura de salida
        ob_end_clean();
    
        // Enviar las cabeceras HTTP
        header("Content-type: " . $imageType);
        header("Content-Length: " . mb_strlen($imagenGenerada, '8bit'));
    
        // Enviar la imagen
        echo $imagenGenerada;
    
        // Liberar memoria
        imagedestroy($imagen);
    } else {
        echo 'Imagen no encontrada...';
    }

} else {
    echo "Parámetros no especificados.";
}

  