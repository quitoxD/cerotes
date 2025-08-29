<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conexion = new mysqli("localhost", "root", "", "escuela");

// Si no hay sesión activa, pero hay cookies
if (!isset($_SESSION['usuario']) && isset($_COOKIE['usuario'])) {
    $username = $_COOKIE['usuario'];

    // Validamos que exista en la BD
    $query = $conexion->prepare("SELECT nombreUsuario, rol FROM usuario WHERE nombreUsuario=?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($user = $result->fetch_assoc()) {
        $_SESSION['usuario'] = $user['username'];
        $_SESSION['rol'] = $user['rol'];
    }
}

// Si después de todo no hay sesión → al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
