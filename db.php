<?php
$host = "localhost";
$user = "root";     // Usuario por defecto de XAMPP
$pass = "";         // Contraseña vacía en XAMPP
$db   = "escuela";  // Nombre de tu base de datos

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
