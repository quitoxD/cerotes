<?php include("autologin.php"); ?>
<?php
$conexion = new mysqli("localhost", "root", "", "sistema_reportes");
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conexion->query("SELECT * FROM reportes WHERE id=$id");
    $reporte = $resultado->fetch_assoc();
}

if (isset($_POST['actualizar'])) {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $conexion->query("UPDATE reportes SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id");
    header("Location: ver_reportes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Reporte</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 30px; }
    .form-container {
      width: 500px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; margin-bottom: 20px; color: #2c3e50; }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      background: #27ae60;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 6px;
      width: 100%;
      cursor: pointer;
    }
    button:hover { background: #219150; }
    .volver {
      display: block;
      margin-top: 15px;
      text-align: center;
      text-decoration: none;
      background: #2980b9;
      color: #fff;
      padding: 8px;
      border-radius: 6px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>✏️ Editar Reporte</h2>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $reporte['id']; ?>">
      <label>Título:</label>
      <input type="text" name="titulo" value="<?php echo $reporte['titulo']; ?>" required>
      
      <label>Descripción:</label>
      <textarea name="descripcion" rows="5" required><?php echo $reporte['descripcion']; ?></textarea>
      
      <button type="submit" name="actualizar">💾 Guardar Cambios</button>
    </form>
    <a href="ver_reportes.php" class="volver">⬅️ Volver</a>
  </div>
</body>
</html>