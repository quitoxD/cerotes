<?php include("autologin.php"); ?>
<?php
// index.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #2d5876ff;
        }

        header {
            border: 1px solid #D2C1B6;;
            background: #D2C1B6;;
            color: black;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .profile {
            position: absolute;
            top: 10px;
            left: 10px;
            border: 2px solid black;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-container input {
            padding: 10px;
            width: 300px;
            color: black;
            border-radius: 6px;
            border: 1px solid #eadcd4ff;
            font-size: 16px;
            background: #eadcd4ff;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 40px;
        }

        .card {
            width: 300px;
            text-align: left;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
        }

        .card-header {
            display: flex;
            background: #D2C1B6;;
            color: black;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-content {
            background: #456882;
            color: white;
            padding: 20px;
            height: 150px;
        }

        .card-content p {
            margin: 10px 0;
        }

        a.card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

    </style>
</head>
<body>
    <header>
        Principal
        
<a href="logout.php">Cerrar Sesión</a>
    </header>

    <div class="search-container">
        <!-- Ahora sin el "ej: Registro de Docentes" -->
        <input type="text" id="searchInput" placeholder="Search">
    </div>

    <div class="cards-container">

        <!-- Card Docentes -->
        <a href="DocenteR.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    REGISTRO DE DOCENTES
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>

        <!-- Card Alumnos -->
        <a href="AlumnoR.php" class="card-link">
            <div class="card" data-title="REGISTRO DE ALUMNOS">
                <div class="card-header">
                    REGISTRO DE ALUMNOS
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE ALUMNOS</p>
                </div>
            </div>
        </a>


        <!-- Card Horarios -->
        <a href="Horario.php" class="card-link">
            <div class="card" data-title="HORARIOS">
                <div class="card-header">
                    HORARIOS
                    <span></span>
                </div>
                <div class="card-content">
                    <p>VER HORARIOS</p>
                </div>
            </div>
        </a>

    </div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const cards = document.querySelectorAll(".card");

        // Evento al presionar Enter
        searchInput.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                const searchValue = searchInput.value.trim().toUpperCase();

                let found = false;

                cards.forEach(card => {
                    const title = card.getAttribute("data-title");
                    if (title.includes(searchValue) || searchValue === "") {
                        card.parentElement.style.display = "block"; // Mostrar
                        found = true;
                    } else {
                        card.parentElement.style.display = "none"; // Ocultar
                    }
                });

                if (!found) {
                    alert("No se encontró el registro buscado.");
                }
            }
        });
    </script>

</body>
</html>