<?php
/**
 * Este archivo se conecta a la base de datos.
 *
 * Este archivo se utiliza para establecer una conexión con la base de datos MySQL
 * utilizando las credenciales proporcionadas. Se utiliza en todo el proyecto
 * para interactuar con la base de datos.
 *
 * PHP version 8
 *
 * @category Database
 * @package  Ambatolugaresdb
 * @author   Your Name <your.email@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.itsbolivar.edu.ec/web/index.php
 */

/** 
 * Dirección del host de la base de datos.
 *
 * Esta variable contiene la dirección del host de la base de datos MySQL.
 * Se utiliza para establecer una conexión con la base de datos.
 *
 * @var string 
 */
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'ambatolugaresdb';

try {
    // Crear conexión y seleccionar DB
    $db = new PDO(
        'mysql:host=' . $dbHost . ';dbname=' . $dbName, 
        $dbUsername, 
        $dbPassword
    );
      
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
