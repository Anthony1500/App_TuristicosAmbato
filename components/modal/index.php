<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Secular+One&amp;display=swap'><link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./lista.css">
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../main.css">

</head>
<body>

<div class="modal">
	<article class="modal-container">
		<header class="modal-container-header">
			<h1 class="modal-container-title">
			<img src="" alt="">
			<span id="titulo"></span>				
			</h1>
			<button id="modalclose" class="icon-button" >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path fill="red" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                </svg>
            </button>
		</header>
		<section class="modal-container-body rtf">

		
		
<!-- partial:index.partial.html -->
<div class="content">

<ul class="team">
<?php
require '../db/conexion.php';
$result = null;
if (isset($_GET["titulo"])) {
    $titulo = $_GET["titulo"]; // Accede a la variable enviada desde JavaScript    
	$titulo = strip_tags($titulo); // Elimina las etiquetas HTML y PHP
	$titulo = trim($titulo); // Elimina los espacios en blanco al principio y al final

    // Determina qué consulta SQL ejecutar en función del título
    switch ($titulo) {
        case 'Parques':
            $result = $db->query("SELECT * FROM parques");
            break;
        case 'Iglesias':
            $result = $db->query("SELECT * FROM iglesias");
            break;
        case 'Museos':
            $result = $db->query("SELECT * FROM museos");
            break;
        case 'Restaurantes':
            $result = $db->query("SELECT * FROM restaurantes");
            break;
        case 'Eventos Festivos':
            $result = $db->query("SELECT * FROM eventosfestivos");            
            break;
        default:
            echo "Título no reconocido.";
            exit(); // Termina el script si el título no es reconocido
    }
}
if ($result === false) {
    
} else if ($result !== null && $result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       
   

?>
	
<li class="nombre number" onclick="abrirIframe('<?php echo $row['id']; ?>', '<?php echo $row['nombre']; ?>')">
	        <div class="thumb"><img src="view.php?id=<?php echo $row['id']; ?>&titulo=<?php echo $titulo; ?>"></div>
            <div class="description">
			<p><?php echo $row['descripcion']; ?><br><a><?php echo $row['nombre']; ?></a></p>
            </div>
        </li>	

		
	  
<?php
     }
		
}else{
    echo "No se encontraron registros.";
	
}
?>
</ul>
<iframe id="miFrame" src="../info_modal/index.php" style="display:none;"></iframe>

</div>
<!-- parte final -->
  


		</section>
		<footer class="modal-container-footer">
			
		</footer>
	</article>
</div>

<script src="./script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

</body>
</html>
