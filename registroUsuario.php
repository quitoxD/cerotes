<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'], $_POST['rol'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Encriptar la contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = $conexion->prepare("INSERT INTO usuario (nombreUsuario, contraseña, rol) VALUES (?, ?, ?)");
    $query->bind_param("sss", $username, $hash, $rol);

    if ($query->execute()) {
        echo "✅ Usuario registrado con éxito. <a href='login.php'>Inicia sesión aquí</a>";
    } else {
        echo "❌ Error al registrar: " . $conexion->error;
    }
} else {
?>
    <!-- Formulario de registro -->
    <form method="POST">
        Usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="password" required><br>
        Rol:
        <select name="rol" required>
            <option value="Director">Director</option>
            <option value="Docente">Docente</option>
        </select><br>
        <button type="submit">Registrar</button>
    </form>
<?php
}
?>
