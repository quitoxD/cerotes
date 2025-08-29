<?php include("autologin.php"); ?>
<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

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
  <title>Listado de Reportes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #2d5876; /* Fondo azul */
      text-align: center;
    }

    /* Barra superior */
    header {
      display: flex;
      justify-content: space-between;
      background: #D2C1B6;
      padding: 10px 20px;
      border: 1px #D2C1B6;
    }
    header a {
      text-decoration: none;
      background: #ece1da;
      padding: 8px 15px;
      border: 1px solid #aaa;
      color: black;
      font-weight: bold;
    }

    h1 {
      margin: 20px 0;
      color: white;
    }

    /* Tabla */
    table {
      width: 95%;
      margin: 20px auto;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid black;
      padding: 10px;
    }

    th {
      background: #d5c1bb;
      color: black;
    }

    td {
      background-color: #e6dbd7;
    }

    /* Botones */
    .btn-editar {
      margin: 0 5px;
      padding: 5px 10px;
      text-decoration: none;
      background: #bad5de;  /* Azul claro */
      border: 1px solid #000;
      color: black;
      border-radius: 3px;
    }
    .btn-borrar {
      margin: 0 5px;
      padding: 5px 10px;
      text-decoration: none;
      background: #c98a8a;  /* Rojo */
      border: 1px solid #000;
      color: black;
      border-radius: 3px;
    }
  </style>
</head>
<body>

<header>
    <a href="reportes.html">NUEVO REPORTE</a>
    <a href="PrincipalDocente.php">INICIO</a>
</header>

<h1>Listado de Reportes</h1>

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
                  <td>
                    <a class='btn-editar' href='editar_reporte.php?id=".$row['id']."'>Editar</a>
                    <a class='btn-borrar' href='eliminar_reporte.php?id=".$row['id']."' onclick=\"return confirm('¿Seguro que quieres eliminar este reporte?');\">Borrar</a>
                  </td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='5'>No hay reportes registrados</td></tr>";
  }
  ?>
</table>

</body>
</html>

<?php $conexion->close(); ?>
