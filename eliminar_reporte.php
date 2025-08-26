<?php include("autologin.php"); ?>
<?php
$conexion = new mysqli("localhost", "root", "", "sistema_reportes");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conexion->query("DELETE FROM reportes WHERE id=$id");
}

header("Location: ver_reportes.php");
exit();
?>