<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "escuela";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #fff;
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
            background: #eceaea;
            padding: 8px 15px;
            border: 1px solid #000;
            color: black;
        }
        h1 {
            margin: 20px 0;
        }
        form.buscar {
            margin: 20px auto;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        form.buscar input {
            padding: 8px;
            width: 250px;
            border: 1px solid #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background: black;
            color: white;
            padding: 10px;
        }
        td {
            padding: 8px;
        }
        .acciones a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            background: #ddd;
            border: 1px solid #000;
            color: black;
        }
        .acciones a:hover {
            background: #bbb;
        }
    </style>
</head>
<body>

<header>
    <a href="AlumnoR.php">REGISTRAR ALUMNO</a>
    <a href="Principal.php">INICIO</a>
</header>

<h1>Listado de Alumnos</h1>

<!-- Barra de búsqueda -->
<form class="buscar" onsubmit="return false;">
    <input type="text" id="buscar" placeholder="Buscar por Nombre, NIE o Responsable">
</form>

<!-- Aquí se cargará la tabla -->
<div id="tablaAlumnos">
    <?php include "buscar_alumnos.php"; ?>
</div>

<script>
// Buscar en tiempo real
document.getElementById("buscar").addEventListener("keyup", function() {
    let valor = this.value;

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "buscar_alumnos.php?buscar=" + encodeURIComponent(valor), true);
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById("tablaAlumnos").innerHTML = this.responseText;
        }
    };
    xhr.send();
});

function eliminarAlumno(id) {
    if (confirm("¿Seguro que deseas eliminar este alumno?")) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "EliminarAlumno.php?id=" + id, true);
        xhr.onload = function() {
            if (this.status === 200) {
                alert(this.responseText);
                // refrescar tabla automáticamente
                document.getElementById("buscar").dispatchEvent(new Event("keyup"));
            }
        };
        xhr.send();
    }
}

</script>

</body>
</html>
