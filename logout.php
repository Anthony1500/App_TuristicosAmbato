<?php
/**
 * Este archivo inicia y luego destruye una sesión.
 * También elimina una cookie establecida y luego redirige al usuario a 'index.php'.
 *
 * PHP version 8
 *
 * @category Session_Management
 * @package  Session_Package
 * @author   Your Name <your.email@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.itsbolivar.edu.ec/web/index.php
 */

session_start(); // Inicia la sesión
session_destroy(); // Destruye la sesión

// Establece la cookie con una fecha de vencimiento en el pasado para eliminarla
setcookie('modalShown', '', time() - 3600);

header('Location: index.php'); // Redirige al usuario a 'index.php'

