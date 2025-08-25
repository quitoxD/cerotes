<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Docente</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff;
        }
        /* Barra superior */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #fff;
            border-bottom: 2px solid red;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            box-sizing: border-box;
            z-index: 1000;
        }
        .top-bar button {
            padding: 8px 15px;
            border: 1px solid #999;
            background: #eee;
            cursor: pointer;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .top-bar button:hover {
            background: #ddd;
        }
        /* Contenido principal */
        .form-container {
            margin-top: 100px; /* espacio para que no tape la barra */
            text-align: center;
        }
        h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        label {
            display: block;
            font-size: 0.8rem;
            margin: 10px 0 5px;
        }
        input {
            width: 300px;
            padding: 10px;
            border: 1px solid #000;
            outline: none;
            font-size: 1rem;
        }
        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 30px;
            background: #000;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        button[type="submit"]:hover {
            background: #333;
        }
    </style>
</head>
<body>

    <!-- Barra superior -->
    <div class="top-bar">
        <button onclick="window.location.href='Principal.php'">REGRESAR</button>
        <button onclick="window.location.href='listado.php'">LISTADO</button>
    </div>

    <!-- Formulario -->
    <div class="form-container">
        <h2>registrar docente</h2>
        <form action="registrar.php" method="POST">
            <label for="nombre">NOMBRE</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">CORREO ELECTRÓNICO</label>
            <input type="email" id="correo" name="correo" required>

            <button type="submit">Ingresar</button>
        </form>
    </div>

</body>
</html>