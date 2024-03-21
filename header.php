<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header>
    <h1>Tienda de Postres</h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Categorías</a>
                <div class="dropdown-content">
                    <a href="catalogo.php?categoria=pastel">Pasteles</a>
                    <a href="catalogo.php?categoria=galleta">Galletas</a>
                    <a href="catalogo.php?categoria=gelatina">Gelatinas</a>
                    <a href="catalogo.php?categoria=cupcake">Cupcakes</a>
                    <a href="catalogo.php">Todos los postres</a>
                </div>
            </li>
            <li><a href="conocenos.php">Conocenos</a></li>
            <li><a href="Sucursales.php">Sucursales</a></li>
            <li><a href="Promociones.php">Promociones</a></li>
        </ul>
    </nav>
</header>

</body>
</html>
