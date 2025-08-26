<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: Principal.php");
    exit();
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
