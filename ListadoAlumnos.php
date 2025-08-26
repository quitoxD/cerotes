<?php include("autologin.php"); ?>
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
            margin: 0;
            padding: 0;
            background: #2d5876ff;
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
            margin: 20px 0;
            color: white;
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
            background-color: #eadcd4ff;
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
            background: #d5c1bbff;
            color: black;
            padding: 10px;
        }
        td {
            padding: 8px;
            background-color: #e6dbd7ff;
        }

        /* BOTONES */
        .btn-editar {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            background: #bad5deff;   /* Verde */
            border: 1px solid #000;
            color: black;
            border-radius: 4px;
        }
        .btn-editar:hover {
            background: #bad5deff;
        }

        .btn-borrar {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            background: #c98a8aff;   /* Rojo */
            border: 1px solid #000;
            color: black;
            border-radius: 4px;
        }
        .btn-borrar:hover {
            background: #c98a8aff;
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
