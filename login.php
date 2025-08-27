<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: Principal.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #285878; /* azul oscuro */
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: #d9c7bc; /* beige */
            padding: 25px;
            display: flex;
            justify-content: flex-end;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        form {
            background-color: transparent;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }

        form label {
            display: block;
            color: white;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f4e6df; /* beige claro */
            border-radius: 4px;
        }

        form input[type="checkbox"] {
            margin-right: 5px;
        }

        form button {
            margin-top: 20px;
            background-color: #457094; /* azul grisáceo */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
        }

        form button:hover {
            background-color: #365a74;
        }

        h2 {
            color: white;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <!-- Si quieres puedes añadir botones aquí -->
</div>

<div class="form-container">
    <form method="post" action="procesar_login.php">
        <h2>Iniciar sesión</h2>
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <label style="color: white; font-weight: normal; text-align: left;">
            <input type="checkbox" name="recordar"> Mantener sesión iniciada
        </label>

        <button type="submit">Iniciar Sesión</button>
    </form>
</div>

</body>
</html>
