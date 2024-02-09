
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="../../style.css">

</head>
<body>

<div class="modal">
	<article class="modal-container">
		<header class="modal-container-header">
			<h1 class="modal-container-title">
			<img id="img" src="" alt="">
			<span id="titulo"></span>				
			</h1>
			<button id="modalclose" class="icon-button" >
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                   <path fill="none" d="M0 0h24v24H0z" />
                   <path fill="black" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
               </svg>
           </button>
		</header>
		<section class="modal-container-body rtf">


<?php
require '../db/conexion.php';
$result = null;

if (isset($_GET["titulo"]) && isset($_GET["id"])) {
    $titulo = $_GET["titulo"]; // Accede a la variable enviada desde JavaScript    
	$titulo = strip_tags($titulo); // Elimina las etiquetas HTML y PHP
	$titulo = trim($titulo); // Elimina los espacios en blanco al principio y al final
	$id = $_GET["id"]; // Accede a la variable enviada desde JavaScript    
	$id = strip_tags($id); // Elimina las etiquetas HTML y PHP
	$id = trim($id); // Elimina los espacios en blanco al principio y al final

    // Determina qué consulta SQL ejecutar en función del título
    switch ($titulo) {
		case 'Parques':
			$stmt = $db->prepare("SELECT * FROM parques WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			break;
		case 'Iglesias':
			$stmt = $db->prepare("SELECT * FROM iglesias WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			break;
		case 'Museos':
			$stmt = $db->prepare("SELECT * FROM museos WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			break;
		case 'Restaurantes':
			$stmt = $db->prepare("SELECT * FROM restaurantes WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			break;
		default:
            echo "Título no reconocido.";
            exit(); // Termina el script si el título no es reconocido
    }
}
if ($result === false) {
    // manejo de error
} else if ($result !== null && count($result) > 0) {
	
    foreach ($result as $row) {		
        echo "<h2>" . $row['nombre'] . "</h2>";
        echo "<p>" . $row['descripcion'] . "</p>";
		echo "<p><img src='../modal/view.php?id=" . $row['id'] . "&titulo=" . $titulo . "'></p>";
        echo "<h2>Ubicación</h2>";
		echo "<div style='position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border: 1px solid black;'>
        " . $row['ubicacion'] . "</div>";

    }
} else {
    echo "No se encontraron registros.";
}

?>	

		</section>
		
	</article>
</div>

<script src="./script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
