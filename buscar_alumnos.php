<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "escuela";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$busqueda = "";
if (isset($_GET['buscar'])) {
    $busqueda = $conn->real_escape_string($_GET['buscar']);
    $sql = "SELECT id_alumno, nombre, nie, responsable, num_responsable, modalidad, seccion, anio, fecha_registro 
            FROM alumnos 
            WHERE nombre LIKE '%$busqueda%' 
               OR nie LIKE '%$busqueda%' 
               OR responsable LIKE '%$busqueda%'";
} else {
    $sql = "SELECT id_alumno, nombre, nie, responsable, num_responsable, modalidad, seccion, anio, fecha_registro FROM alumnos";
}

$result = $conn->query($sql);

// Construir tabla
echo "<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIE</th>
            <th>Responsable</th>
            <th>Tel. Responsable</th>
            <th>Modalidad</th>
            <th>Sección</th>
            <th>Año</th>
            <th>Fecha Registro</th>
            <th>Acciones</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_alumno']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['nie']}</td>
                <td>{$row['responsable']}</td>
                <td>{$row['num_responsable']}</td>
                <td>{$row['modalidad']}</td>
                <td>{$row['seccion']}</td>
                <td>{$row['anio']}</td>
                <td>{$row['fecha_registro']}</td>
                <td class='acciones'>
                    <a href='EditarAlumno.php?id={$row['id_alumno']}'>Editar</a>
                    <a href='#' onclick='eliminarAlumno(".$row['id_alumno'].")'>Borrar</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='10'>No hay alumnos registrados</td></tr>";
}
echo "</table>";

$conn->close();
?>
