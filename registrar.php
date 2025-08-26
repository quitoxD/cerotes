<?php include("autologin.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $correo = htmlspecialchars($_POST["correo"]);

    echo "<h2>Docente registrado</h2>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Correo:</strong> $correo</p>";
} else {
    echo "Acceso no permitido.";
}

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];

    $sql = "INSERT INTO docentes (nombre, correo) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $correo);

    if ($stmt->execute()) {
        echo "<script>alert('Docente registrado correctamente'); window.location.href='listado.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>