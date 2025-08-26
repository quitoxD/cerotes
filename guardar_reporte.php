<?php include("autologin.php"); ?>
<?php
$conexion = new mysqli("localhost", "root", "", "sistema_reportes");

if ($conexion->connect_error) {
    die("<p class='error'>❌ Error de conexión: " . $conexion->connect_error . "</p>");
}

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$stmt = $conexion->prepare("INSERT INTO reportes (titulo, descripcion) VALUES (?, ?)");
$stmt->bind_param("ss", $titulo, $descripcion);

if ($stmt->execute()) {
    echo "<div style='text-align:center; font-family:Arial;'>
            <p class='success' style='color:green; font-size:18px;'>✅ Reporte registrado correctamente</p>
            <a href='reportes.html' style='text-decoration:none; color:#2980b9; font-weight:bold;'>Volver</a>
          </div>";
} else {
    echo "<p class='error'>❌ Error: " . $stmt->error . "</p>";
}

$stmt->close();
$conexion->close();
?>