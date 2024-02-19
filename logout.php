<?php
session_start(); // Inicia la sesión
session_destroy(); // Destruye la sesión
// Establece la cookie con una fecha de vencimiento en el pasado para eliminarla
setcookie('modalShown', '', time() - 3600);
header('Location: index.php'); // Redirige al usuario a 'index.php'
?>