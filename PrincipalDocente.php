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
            border: 1px solid #D2C1B6;
            background: #D2C1B6;
            color: black;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            position: relative;
        }

        /* Botón cerrar sesión arriba a la derecha */
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f4e6df;
            border: 1px solid black;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            color: black;
            text-transform: uppercase;
        }

        .logout-btn:hover {
            background: #e0d0c6;
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
         display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 columnas */
        gap: 40px; /* espacio entre tarjetas */
        justify-items: center; /* centra las cards en su celda */
        margin: 40px auto;
        max-width: 1200px; /* evita que se estiren demasiado */
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
            background: #D2C1B6;
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
        Principal docente
        <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
    </header>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search">
    </div>

    <div class="cards-container">

        <!-- Card Docentes -->
        <a href="Modalidades/Aduana.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    ADUANA
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>

        <!-- Card Alumnos -->
        <a href="Modalidades/Contador.php" class="card-link">
            <div class="card" data-title="REGISTRO DE ALUMNOS">
                <div class="card-header">
                    CONTADOR
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE ALUMNOS</p>
                </div>
            </div>
        </a>

        <!-- Card Horarios -->
        <a href="Modalidades/General.php" class="card-link">
            <div class="card" data-title="HORARIOS">
                <div class="card-header">
                    GENERAL
                    <span></span>
                </div>
                <div class="card-content">
                    <p>VER HORARIOS</p>
                </div>
            </div>
        </a>

        <a href="Modalidades/Infraestructura.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    INFRAESTRUCTURA
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>

        <a href="Modalidades/Software.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    SOFTWARE
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>
            
        <a href="Modalidades/Salud.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    SALUD
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>

        <a href="Modalidades/Turismo.php" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    TURISMO
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>

        <a href="reportes.html" class="card-link">
            <div class="card" data-title="REGISTRO DE DOCENTES">
                <div class="card-header">
                    Reportes
                    <span></span>
                </div>
                <div class="card-content">
                    <p>REGISTRAR, EDITAR Y ELIMINAR</p>
                    <p>LISTADO DE DOCENTES</p>
                </div>
            </div>
        </a>


    </div>

    <script>
    const searchInput = document.getElementById("searchInput");
    const cards = document.querySelectorAll(".card");

    searchInput.addEventListener("input", function() {
        const searchValue = searchInput.value.trim().toUpperCase();
        let found = false;

        cards.forEach(card => {
            // Obtener el texto del header de cada card
            const headerText = card.querySelector(".card-header").textContent.toUpperCase();

            if (headerText.includes(searchValue) || searchValue === "") {
                card.parentElement.style.display = "block"; 
                found = true;
            } else {
                card.parentElement.style.display = "none"; 
            }
        });

        // Mostrar alerta solo si no hay resultados
        if (!found && searchValue !== "") {
            // ⚠️ En vez de alert, puede ser mejor mostrar un mensaje en la página
            console.log("No se encontró el registro buscado.");
        }
    });
</script>



</body>
</html>

<a href="logout.php">Cerrar Sesión</a>

