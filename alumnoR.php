<?php include("autologin.php"); ?>
<?php
// AlumnoR.php

// Configuración de conexión MySQL
$servername = "localhost";
$username   = "root";   // tu usuario MySQL
$password   = "";       // tu contraseña (si usas XAMPP normalmente está vacío)
$dbname     = "escuela";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre          = $_POST['nombre'];
    $nie             = $_POST['nie'];
    $responsable     = $_POST['responsable'];
    $num_responsable = $_POST['num_responsable'];
    $modalidad       = $_POST['modalidad'];
    $seccion         = $_POST['seccion'];
    $anio            = $_POST['anio'];

    // Insertar en la tabla
    $stmt = $conn->prepare("INSERT INTO alumnos 
        (nombre, nie, responsable, num_responsable, modalidad, seccion, anio) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $nombre, $nie, $responsable, $num_responsable, $modalidad, $seccion, $anio);

    if ($stmt->execute()) {
        echo "<script>alert('Alumno registrado correctamente');</script>";
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
    <title>Registrar Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #2d5876ff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            display: flex;
            justify-content: space-between;
            background: #D2C1B6;
            padding: 10px 20px;
            border: 1px #D2C1B6;
        }
        header a {
            text-decoration: none;
            background: #ece1daff;
            padding: 8px 15px;
            border: 1px solid #aaa;
            color: black;
        }
        h1 {
            margin: 40px 0;
            font-size: 32px;
            color: white;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            justify-content: center;
            align-items: center;
            max-width: 700px;
            margin: auto;
            color: white;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            text-align: left;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid black;
            justify-self: start;  
            background-color: #ece1daff;   
        }
        .full {
            grid-column: span 2;
        }
        button {
            margin-top: 30px;
            padding: 10px 25px;
            background: #456882;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #3f5a6fff;
        }
    </style>
</head>
<body>

<header>
    <a href="Principal.php">REGRESAR</a>
    <a href="ListadoAlumnos.php">LISTADO</a>
</header>

<h1>registrar Alumno</h1>

<form method="POST" action="">
    <div>
        <label for="nombre">NOMBRE</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div>
        <label for="modalidad">MODALIDAD</label>
        <select id="modalidad" name="modalidad" required>
            <option value="">Seleccione...</option>
            <option value="Presencial">Presencial</option>
            <option value="Virtual">Virtual</option>
        </select>
    </div>

    <div>
        <label for="nie">NIE</label>
        <input type="text" id="nie" name="nie" required>
    </div>

    <div>
        <label for="seccion">SECCION</label>
        <select id="seccion" name="seccion" required>
            <option value="">Seleccione...</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
    </div>

    <div>
        <label for="responsable">RESPONSABLE</label>
        <input type="text" id="responsable" name="responsable" required>
    </div>

    <div>
        <label for="anio">AÑO</label>
        <select id="anio" name="anio" required>
            <option value="">Seleccione...</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
        </select>
    </div>

    <div>
        <label for="num_responsable">NUMERO DE RESPONSABLE</label>
        <input type="text" id="num_responsable" name="num_responsable" required>
    </div>

    <div class="full">
        <button type="submit">Ingresar</button>
    </div>
</form>

</body>
</html>
