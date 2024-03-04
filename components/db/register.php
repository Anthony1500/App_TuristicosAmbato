<?php
/**
 * Este archivo se utiliza para registrar un nuevo usuario en la aplicación.
 *
 * Este archivo recibe los datos del formulario de registro, 
 * establece una conexión con la base de datos utilizando 'conexion.php',
 * y luego inserta un nuevo usuario en la base de datos.
 *
 * PHP version 8
 *
 * @category Authentication
 * @package  Register
 * @author   Your Name <your.email@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.itsbolivar.edu.ec/web/index.php
 */
require 'conexion.php';

// Captura los datos del formulario
$data = json_decode(file_get_contents('php://input'), true);
$usuario = $data['user'];
$correo = $data['email'];
$password = $data['password'];

// Validación de los datos del formulario
if (empty($usuario) || empty($correo) || empty($password)) {
    echo json_encode(
        [
            'success' => false, 
            'message' => 'Por favor, llena todos los campos'
        ]
    );
    return;
}

$emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
if (!preg_match($emailRegex, $correo)) {
    echo json_encode(
        [
            'success' => false, 
            'message' => 'Por favor, introduce una dirección de correo electrónico válida'
        ]
    );
    return;
}

// Prepara la consulta SQL
$stmt = $db->prepare(
    "INSERT INTO login (nombre_usuario, correo, password) VALUES (:nombre_usuario, :correo, :password)"
);
$stmt->bindParam(':nombre_usuario', $usuario);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $password);

// Ejecuta la consulta
try {
    $stmt->execute();
    // El usuario fue registrado exitosamente
    header('Content-Type: application/json');
    session_start(); // Inicia la sesión
    // Almacena el nombre de usuario en la sesión
    $_SESSION['nombre_usuario'] = $usuario;      
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    // Hubo un error al registrar al usuario
    echo json_encode(
        [
            'success' => false, 
            'message' => 'Error al registrar el usuario: ' . $e->getMessage()
        ]
    );
}

$stmt = null;
$db = null;
