<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reposteria Piña</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>    
    <header>
        <div><img src="img/Logo.jpeg" class="img-Logo"></div>
        <div>
            <input type="text" class="input-buscador" placeholder="Buscar un postre, sabor o tamaño">
            <nav>
                <div>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="conocenos.php">Conocenos</a></li>
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
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Tamaño</a>
                            <div class="dropdown-content">
                                <a href="catalogo.php?tamaño=Grande">Grande</a>
                                <a href="catalogo.php?tamaño=Mediano">Mediano</a>
                                <a href="catalogo.php?tamaño=Chico">Chico</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Precio</a>
                            <div class="dropdown-content">
                            <a href="catalogo.php?precio=200">Menos de $200</a>
                            <a href="catalogo.php?precio=300">Menos de $300</a>
                            <a href="catalogo.php?precio=400">Menos de $400</a>
                            <a href="catalogo.php?precio=600">$Menos de $600</a>
                            <a href="catalogo.php?precio=600">$Menos de $600</a>
                            <a href="catalogo.php?precio=700">$Menos de $700</a>
                            <a href="catalogo.php?precio=800">Más de $700</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Sabor</a>
                            <div class="dropdown-content">
                                <a href="catalogo.php?sabor=chocolate">Chocolate</a>
                                <a href="catalogo.php?sabor=vainilla">Vainilla</a>
                            </div>
                        </li>
                        <li><a href="Sucursales.php">Sucursales</a></li>
                        <li><a href="Promociones.php">Promociones</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>
</html>
