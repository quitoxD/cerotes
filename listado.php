<?php include("autologin.php"); ?>
<?php
include "db.php";

$sql = "SELECT * FROM docentes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Docentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #2d5876ff;
        }
        /* Barra superior */
        .top-bar {
            border: 1px #D2C1B6;;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #D2C1B6;
        }
        .top-bar a {
            padding: 10px 15px;
            background: #ece1daff;
            border: 1px solid #000;
            text-decoration: none;
            font-size: 13px;
            color: #000;
            font-weight: bold;
        }
        .top-bar a:hover {
            background: #ece1daff;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #e2d6d2ff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #d5c1bbff;
            color: #000000ff;
        }
        tr:nth-child(even) {
            background: #e6dbd7ff;
        }
        .btn {
            padding: 6px 12px;
            margin: 2px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-edit {
            background: #bad5deff;
            border: 1px solid #000;
            color: #000000ff;
        }
        .btn-edit:hover {
            background: #bbb;
        }
        .btn-delete {
            background: #c98a8aff;
            border: 1px solid #000;
            color: #000000ff;
        }
        .btn-delete:hover {
            background: #bbb;
        }
        .btn-add {
            display: block;
            margin: 20px auto;
            padding: 10px 15px;
            background: #000;
            color: #fff;
            text-decoration: none;
            text-align: center;
            width: 150px;
            border-radius: 4px;
        }
        .btn-add:hover {
            background: #333;
        }
    </style>
</head>
<body>

    <!-- Barra superior -->
    <div class="top-bar">
        <a href="DocenteR.php">REGISTRAR DOCENTE</a>
        <a href="Principal.php">INICIO</a>
    </div>

    <h2>Listado de Docentes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th></th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nombre"] ?></td>
            <td><?= $row["correo"] ?></td>
            <td>
                <a class="btn btn-edit" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a class="btn btn-delete" href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este docente?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
<?php $conn->close(); ?>
