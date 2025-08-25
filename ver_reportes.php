<?php
$conexion = new mysqli("localhost", "root", "", "sistema_reportes");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT id, titulo, descripcion, fecha FROM reportes ORDER BY fecha DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Reportes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      padding: 30px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    table {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #2980b9;
      color: white;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    tr:hover {
      background: #f1f1f1;
    }

    .acciones a {
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 6px;
      margin: 0 3px;
      font-size: 14px;
      color: #fff;
    }

    .editar {
      background: #27ae60;
    }

    .eliminar {
      background: #e74c3c;
    }

    .volver {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      background: #2980b9;
      color: #fff;
      padding: 10px 15px;
      border-radius: 8px;
      width: 200px;
      margin-left: auto;
      margin-right: auto;
    }

    .volver:hover {
      background: #1f6391;
    }
  </style>
</head>
<body>
  <h2>📋 Lista de Reportes</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>

    <?php
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['titulo']."</td>
                    <td>".$row['descripcion']."</td>
                    <td>".$row['fecha']."</td>
                    <td class='acciones'>
                      <a class='editar' href='editar_reporte.php?id=".$row['id']."'>✏️ Editar</a>
                      <a class='eliminar' href='eliminar_reporte.php?id=".$row['id']."' onclick=\"return confirm('¿Seguro que quieres eliminar este reporte?');\">🗑️ Eliminar</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5' style='text-align:center;'>No hay reportes registrados</td></tr>";
    }
    ?>
  </table>

  <a href="reportes.html" class="volver">➕ Nuevo Reporte</a>
</body>
</html>

<?php $conexion->close(); ?>