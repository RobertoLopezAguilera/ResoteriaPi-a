<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Postres</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<h1>Catálogo de Postres</h1>

<?php
// Consulta SQL base para obtener todos los postres
$sql = "SELECT * FROM Postre WHERE 1=1";

// Verificar si se ha aplicado el filtro de búsqueda por nombre
if(isset($_GET['buscar'])) {
    // Obtener el término de búsqueda
    $buscar = $_GET['buscar'];
    // Agregar filtro por nombre a la consulta SQL
    $sql .= " AND Nombre LIKE '%$buscar%'";
}

// Verificar si se ha aplicado el filtro de categoría
if(isset($_GET['categoria'])) {
    // Obtener la categoría seleccionada
    $categoria = $_GET['categoria'];
    // Agregar filtro por categoría a la consulta SQL
    $sql .= " AND Categoria='$categoria'";
}

// Verificar si se ha aplicado el filtro de precio
if(isset($_GET['precio'])) {
    // Obtener el valor del precio seleccionado
    $precio = $_GET['precio'];
    // Agregar filtro por precio a la consulta SQL
    $sql .= " AND Precio < $precio";
}

// Verificar si se ha aplicado el filtro de tamaño
if(isset($_GET['tamaño'])) {
    // Obtener el tamaño seleccionado
    $tamaño = $_GET['tamaño'];
    // Agregar filtro por tamaño a la consulta SQL
    $sql .= " AND Tamaño='$tamaño'";
}

// Verificar si se ha aplicado el filtro de sabor
if(isset($_GET['sabor'])) {
    // Obtener el sabor seleccionado
    $sabor = $_GET['sabor'];
    // Agregar filtro por sabor a la consulta SQL
    $sql .= " AND Sabor='$sabor'";
}

// Incluir archivo de conexión a la base de datos
include('includes/conexion.php');

// Ejecutar la consulta SQL
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar los resultados
    echo "<div class='catalogo'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='postre'>";
        echo "<h3>" . $row['Nombre'] . "</h3>";
        echo "<p>$" . $row['Precio'] . "</p>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['Imagen']) . "' alt='Imagen del postre'>";
        echo "<form action='comprar.php' method='POST'>";
        echo "<input type='hidden' name='idPostre' value='" . $row['idPostre'] . "'>";
        echo "<button type='submit'class='btn btn-primary'>Comprar</button>";
        echo "</form>";
        echo "<a href='ver_postre.php?id=" . $row['idPostre'] . "'><button class='btn btn-secondary'>Ver</button></a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No se encontraron postres.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>
<?php include('footer.php'); ?>
