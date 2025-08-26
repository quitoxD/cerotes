<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM docentes WHERE id = $id";
    $result = $conn->query($sql);
    $docente = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];

    $sql = "UPDATE docentes SET nombre=?, correo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $correo, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Docente actualizado correctamente'); window.location.href='listado.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Docente</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #2d5876ff;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        text-align: center;
        width: 100%;
        max-width: 400px;
    }
    h2 {
        font-size: 2rem;
        margin-bottom: 40px;
        font-weight: bold;
        color: white;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        font-size: 0.75rem;
        font-weight: 600;
        text-align: left;
        width: 100%;
        margin-bottom: 8px;
        letter-spacing: 2px;   /* más espaciado entre letras */
        color: white;
    }

    input {
        width: 100%;
        max-width: 300px;
        padding: 14px 12px;   /* un poco más alto */
        margin-bottom: 25px;
        border: 1px solid #000;
        outline: none;
        font-size: 1rem;
        font-family: inherit;
        background-color: #ece1daff;
    }

    button {
        background-color: #456882;
        color: #fff;
        font-weight: bold;
        padding: 14px 0;
        width: 160px;  /* ancho fijo como en la imagen */
        border: none;
        cursor: pointer;
        transition: 0.3s;
        font-size: 0.9rem;
    }

    button:hover {
        background-color: #456882;
    }
</style>

</head>
<body>
    <div class="container">
        <h2>Editar Docente</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $docente['id'] ?>">
            
            <label for="nombre">NOMBRE</label>
            <input type="text" id="nombre" name="nombre" value="<?= $docente['nombre'] ?>" required>
            
            <label for="correo">CORREO</label>
            <input type="email" id="correo" name="correo" value="<?= $docente['correo'] ?>" required>
            
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
