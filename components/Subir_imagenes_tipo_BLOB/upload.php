<?php
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Validar tipo de archivo
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            echo "Solo se permiten archivos de tipo JPG, PNG o GIF.";
            exit();
        }
        $dbHost = 'localhost'; $dbUsername = 'root'; $dbPassword = ''; $dbName = 'ambatolugaresdb'; 
        // Crea una conexión PDO
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);

        // Prepara la consulta SQL
        $stmt = $db->prepare("INSERT INTO restaurantes (imagen) VALUES (?)");
        $stmt->bindParam(1, $imgContent, PDO::PARAM_LOB);

        // Lee la imagen en binario
        $imgContent = file_get_contents($_FILES['image']['tmp_name']);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo "Archivo subido exitosamente.";
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Por favor, seleccione un archivo de imagen.";
    }
}
