<?php include("autologin.php"); ?>
<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "escuela";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM alumnos WHERE id_alumno = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno eliminado correctamente.";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}

$conn->close();
?>
