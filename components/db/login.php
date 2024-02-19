<?php
/**
 * Este archivo se utiliza para iniciar sesión en la aplicación.
 *
 * Este archivo recibe los datos del formulario de inicio de sesión, 
 * establece una conexión con la base de datos utilizando 'conexion.php',
 * y luego verifica si el usuario existe en la base de datos.
 *
 * PHP version 8
 *
 * @category Authentication
 * @package  Login
 * @author   Your Name <your.email@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.itsbolivar.edu.ec/web/index.php
 */
require 'conexion.php';

// Captura los datos del formulario
$data = json_decode(file_get_contents('php://input'), true);
$correo = $data['email'];
$password = $data['password'];

// Prepara la consulta SQL
$stmt = $db->prepare(
    "SELECT * FROM login WHERE correo = :correo AND password = :password"
);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $password);

// Ejecuta la consulta
$stmt->execute();

// Obtiene los resultados
$result = $stmt->fetchAll();

if (count($result) > 0) {
    // El usuario existe
    session_start(); // Inicia la sesión
    // Almacena el nombre de usuario en la sesión
    $_SESSION['nombre_usuario'] = $result[0]['nombre_usuario']; 
    echo json_encode(['success' => true]);
} else {
    // El usuario no existe
    echo json_encode(
        [
            'success' => false, 
            'message' => 'Correo electrónico o contraseña incorrectos'
        ]
    );
}


$stmt = null;
$db = null;
