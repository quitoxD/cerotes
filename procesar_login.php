<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $recordar = isset($_POST['recordar']);

    $query = $conexion->prepare("SELECT idUsuario, nombreUsuario, contraseña, rol FROM usuario WHERE nombreUsuario=?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['contraseña'])) {
            $_SESSION['usuario'] = $user['nombreUsuario'];
            $_SESSION['rol'] = $user['rol'];

            // Recordar sesión con cookies
            if ($recordar) {
                setcookie("usuario", $user['nombreUsuario'], time() + (86400*30), "/");
                setcookie("rol", $user['rol'], time() + (86400*30), "/");
            }

            // Redirigir según el rol
            if ($user['rol'] === "Director") {
                header("Location: principal.php");
            } elseif ($user['rol'] === "Docente") {
                header("Location: PrincipalDocente.php");
            } else {
                echo "Rol no válido";
            }
            exit();
        } else {
            echo "❌ Contraseña incorrecta";
        }
    } else {
        echo "❌ Usuario no encontrado";
    }
} else {
    echo "Acceso inválido";
}
?>
