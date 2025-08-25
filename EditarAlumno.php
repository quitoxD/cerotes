<?php
// EditarAlumno.php

// Configuración de conexión MySQL
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "escuela";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si llega el ID
if (!isset($_GET['id'])) {
    die("ID de alumno no especificado.");
}

$id_alumno = intval($_GET['id']);

// Obtener datos del alumno
$sql = "SELECT * FROM alumnos WHERE id_alumno = $id_alumno";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Alumno no encontrado.");
}

$alumno = $result->fetch_assoc();

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre          = $_POST['nombre'];
    $nie             = $_POST['nie'];
    $responsable     = $_POST['responsable'];
    $num_responsable = $_POST['num_responsable'];
    $modalidad       = $_POST['modalidad'];
    $seccion         = $_POST['seccion'];
    $anio            = $_POST['anio'];

    $stmt = $conn->prepare("UPDATE alumnos SET nombre=?, nie=?, responsable=?, num_responsable=?, modalidad=?, seccion=?, anio=? WHERE id_alumno=?");
    $stmt->bind_param("ssssssii", $nombre, $nie, $responsable, $num_responsable, $modalidad, $seccion, $anio, $id_alumno);

    if ($stmt->execute()) {
        echo "<script>alert('Alumno actualizado correctamente'); window.location='ListadoAlumnos.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            border: 1px solid red;
        }
        header a {
            text-decoration: none;
            background: #eaeaea;
            padding: 8px 15px;
            border: 1px solid #aaa;
            color: black;
        }
        h1 {
            margin: 40px 0;
            font-size: 32px;
        }
        form {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            justify-content: center;
            align-items: start;
            max-width: 800px;
            margin: auto;
        }
        form div {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-bottom: 5px;
            font-size: 14px;
            text-align: left;
        }
        form input, 
        form select {
            width: 100%;
            padding: 8px;
            border: 1px solid black;
            box-sizing: border-box;
        }
        .button-container {
            grid-column: span 2;
            display: flex;
            justify-content: center;
        }
        button {
            padding: 10px 25px;
            background: black;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #333;
        }
    </style>
</head>
<body>

<header>
    <a href="ListadoAlumnos.php">LISTADO</a>
    <a href="Principal.php">INICIO</a>
</header>

<h1>Editar Alumno</h1>

<form method="POST" action="">
    <div>
        <label for="nombre">NOMBRE</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
    </div>

    <div>
        <label for="modalidad">MODALIDAD</label>
        <select id="modalidad" name="modalidad" required>
            <option value="">Seleccione...</option>
            <option value="Presencial" <?php if($alumno['modalidad']=="Presencial") echo "selected"; ?>>Presencial</option>
            <option value="Virtual" <?php if($alumno['modalidad']=="Virtual") echo "selected"; ?>>Virtual</option>
        </select>
    </div>

    <div>
        <label for="nie">NIE</label>
        <input type="text" id="nie" name="nie" value="<?php echo $alumno['nie']; ?>" required>
    </div>

    <div>
        <label for="seccion">SECCION</label>
        <select id="seccion" name="seccion" required>
            <option value="">Seleccione...</option>
            <option value="A" <?php if($alumno['seccion']=="A") echo "selected"; ?>>A</option>
            <option value="B" <?php if($alumno['seccion']=="B") echo "selected"; ?>>B</option>
            <option value="C" <?php if($alumno['seccion']=="C") echo "selected"; ?>>C</option>
        </select>
    </div>

    <div>
        <label for="responsable">RESPONSABLE</label>
        <input type="text" id="responsable" name="responsable" value="<?php echo $alumno['responsable']; ?>" required>
    </div>

    <div>
        <label for="anio">AÑO</label>
        <select id="anio" name="anio" required>
            <option value="">Seleccione...</option>
            <option value="2025" <?php if($alumno['anio']=="2025") echo "selected"; ?>>2025</option>
            <option value="2026" <?php if($alumno['anio']=="2026") echo "selected"; ?>>2026</option>
            <option value="2027" <?php if($alumno['anio']=="2027") echo "selected"; ?>>2027</option>
        </select>
    </div>

    <div>
        <label for="num_responsable">NUMERO DE RESPONSABLE</label>
        <input type="text" id="num_responsable" name="num_responsable" value="<?php echo $alumno['num_responsable']; ?>" required>
    </div>

    <div></div>

    <div class="button-container">
        <button type="submit">Actualizar</button>
    </div>
</form>

</body>
</html>
