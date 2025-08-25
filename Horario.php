<?php


$pdo = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");

// 1. Obtener catálogos
$modalidades = $pdo->query("SELECT * FROM Modalidad")->fetchAll(PDO::FETCH_ASSOC);
$grados      = $pdo->query("SELECT * FROM Grado")->fetchAll(PDO::FETCH_ASSOC);
$secciones   = $pdo->query("SELECT * FROM Seccion")->fetchAll(PDO::FETCH_ASSOC);

// 2. Filtros seleccionados
$idModalidad = $_GET['modalidad'] ?? null;
$idGrado     = $_GET['grado'] ?? null;
$idSeccion   = $_GET['seccion'] ?? null;

// 3. Consultar horarios si hay filtros
$horarios = [];
if ($idModalidad && $idGrado && $idSeccion) {
    $sql = "SELECT 
                h.diaSemana, h.horaInicio, h.horaFin, h.aula,
                a.nombreAsignatura, u.nombreUsuario AS docente
            FROM Horario h
            JOIN DocenteAsignatura da ON h.idDocenteAsignatura = da.idDocenteAsignatura
            JOIN Asignatura a ON da.idAsignatura = a.idAsignatura
            JOIN Usuario u ON da.idUsuario = u.idUsuario
            WHERE h.idModalidad = :m AND h.idGrado = :g AND h.idSeccion = :s
            ORDER BY FIELD(h.diaSemana,'Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'), h.horaInicio";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":m" => $idModalidad,
        ":g" => $idGrado,
        ":s" => $idSeccion
    ]);
    $horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Horario de Clases</title>
  <style>
    body { font-family: Arial, sans-serif; margin:20px; }
    h2 { color:#333; }
    table { border-collapse: collapse; width:100%; margin-top:15px; }
    th, td { border:1px solid #ddd; padding:8px; text-align:center; }
    th { background:#f4f4f4; }
    tr:nth-child(even) { background:#fafafa; }
    select { padding:5px; margin:5px; }
    button { padding:6px 12px; }

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
  </style>
</head>
<body>
<header>
    <a href="Principal.php">REGRESAR</a>
    <a href="ListadoAlumnos.php">LISTADO</a>
</header>

  <h2>Consultar Horario</h2>
  <form method="GET">
    Modalidad:
    <select name="modalidad" required>
      <option value="">Seleccione</option>
      <?php foreach($modalidades as $m): ?>
        <option value="<?= $m['idModalidad'] ?>" <?= $idModalidad==$m['idModalidad']?'selected':'' ?>>
          <?= htmlspecialchars($m['nombreModalidad']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    Grado:
    <select name="grado" required>
      <option value="">Seleccione</option>
      <?php foreach($grados as $g): ?>
        <option value="<?= $g['idGrado'] ?>" <?= $idGrado==$g['idGrado']?'selected':'' ?>>
          <?= htmlspecialchars($g['nombreGrado']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    Sección:
    <select name="seccion" required>
      <option value="">Seleccione</option>
      <?php foreach($secciones as $s): ?>
        <option value="<?= $s['idSeccion'] ?>" <?= $idSeccion==$s['idSeccion']?'selected':'' ?>>
          <?= htmlspecialchars($s['nombreSeccion']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Ver Horario</button>
  </form>

  <?php if ($horarios): ?>
    <table>
      <tr>
        <th>Día</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Asignatura</th>
        <th>Docente</th>
        <th>Aula</th>
      </tr>
      <?php foreach($horarios as $h): ?>
      <tr>
        <td><?= htmlspecialchars($h['diaSemana']) ?></td>
        <td><?= htmlspecialchars($h['horaInicio']) ?></td>
        <td><?= htmlspecialchars($h['horaFin']) ?></td>
        <td><?= htmlspecialchars($h['nombreAsignatura']) ?></td>
        <td><?= htmlspecialchars($h['docente']) ?></td>
        <td><?= htmlspecialchars($h['aula']) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  <?php elseif ($idModalidad && $idGrado && $idSeccion): ?>
    <p><b>No hay horarios cargados para esta combinación.</b></p>
  <?php endif; ?>
</body>
</html>
