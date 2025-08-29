<?php include("autologin.php"); ?>
<?php
$conexion = new mysqli("localhost", "root", "", "escuela");
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
    body {
      font-family: Arial, sans-serif;
      background: #2d5876ff; /* azul fondo */
      margin: 0;
      padding: 0;
      color: #fff;
    }

    /* Barra superior */
    .top-bar {
      background: #D2C1B6;
      height: 30px;
      padding: 15px 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar a {
      background: #ece1daff;
      color: #000;
      padding: 8px 16px;
      text-decoration: none;
      font-weight: bold;
      border: 1px solid #999;
    }

    h2 {
      text-align: center;
      margin: 30px 0;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
      width: 100%;
      max-width: 600px;
      margin: 0 auto; /* centrado */
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      text-align: center;
    }

    input, textarea {
      width: 60%;          /* más pequeñas */
      padding: 10px;
      border: none;
      border-radius: 3px;
      font-size: 14px;
      background: #ece1daff;
      color: #000;
      display: block;
      margin: 0 auto;      /* centradas */
    }

    textarea {
      resize: none;
      height: 120px;
    }

    .button-group {
        display: flex;
        gap: 15px; /* espacio entre botones */
        justify-content: center;
        margin-top: 10px;
    }

    button, .btn-cancelar {
        background-color: #456882;
        color: #fff;
        font-weight: bold;
        padding: 14px 0;
        width: 160px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        font-size: 0.9rem;
        text-decoration: none;
        text-align: center;
        display: inline-block;
    }

    button:hover, .btn-cancelar:hover {
        background-color: #2c4657;
    }
  </style>
</head>
<body>

  <!-- Barra superior -->
  <div class="top-bar">
  </div>

  <h2>Editar Reporte</h2>

  <form method="post">
    <input type="hidden" name="id" value="<?php echo $reporte['id']; ?>">

    <div>
      <label for="titulo">Título</label>
      <input type="text" id="titulo" name="titulo" value="<?php echo $reporte['titulo']; ?>" required>
    </div>

    <div>
      <label for="descripcion">Descripción</label>
      <textarea id="descripcion" name="descripcion" required><?php echo $reporte['descripcion']; ?></textarea>
    </div>

    <div class="button-group">
        <button type="submit" name="actualizar">Actualizar</button>
        <a href="ver_reportes.php" class="btn-cancelar">Cancelar</a>
    </div>

  </form>

</body>
</html>
