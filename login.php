<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {
    $rol = strtolower(trim($_SESSION['rol']));

    if ($rol === "director") {
        header("Location: Principal.php");
        exit();
    } elseif ($rol === "docente") {
        header("Location: PrincipalDocente.php");
        exit();
    } else {
        echo "Rol no válido: " . htmlspecialchars($_SESSION['rol']);
    }
}
?>


<form method="post" action="procesar_login.php">
    <label>Usuario:</label>
    <input type="text" name="username" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <label>
        <input type="checkbox" name="recordar"> Mantener sesión iniciada
    </label>
    <button type="submit">Iniciar Sesión</button>
</form>
