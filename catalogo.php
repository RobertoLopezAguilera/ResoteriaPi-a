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
$sql = "SELECT * FROM Postre";

// Verificar si se han aplicado filtros
if(isset($_GET['categoria'])) {
    // Obtener la categoría seleccionada
    $categoria = $_GET['categoria'];
    // Mostrar la categoría seleccionada
    echo "<h2>Postres de la categoría: $categoria</h2>";
    // Agregar filtro por categoría a la consulta SQL
    $sql .= " WHERE Categoria='$categoria'";
}

// Verificar si se ha aplicado el filtro de precio
if(isset($_GET['precio'])) {
    // Obtener el valor del precio seleccionado
    $precio = $_GET['precio'];
    // Agregar filtro por precio a la consulta SQL
    if(strpos($sql, "WHERE") !== false) {
        $sql .= " AND Precio < $precio";
    } else {
        $sql .= " WHERE Precio < $precio";
    }
}

// Verificar si se ha aplicado el filtro de tamaño
if(isset($_GET['tamaño'])) {
    // Obtener el tamaño seleccionado
    $tamaño = $_GET['tamaño'];
    // Agregar filtro por tamaño a la consulta SQL
    if(strpos($sql, "WHERE") !== false) {
        $sql .= " AND Tamaño='$tamaño'";
    } else {
        $sql .= " WHERE Tamaño='$tamaño'";
    }
}

// Verificar si se ha aplicado el filtro de sabor
if(isset($_GET['sabor'])) {
    // Obtener el sabor seleccionado
    $sabor = $_GET['sabor'];
    // Agregar filtro por sabor a la consulta SQL
    if(strpos($sql, "WHERE") !== false) {
        $sql .= " AND Sabor='$sabor'";
    } else {
        $sql .= " WHERE Sabor='$sabor'";
    }
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
        echo "<p>Categoría: " . $row['Categoria'] . "</p>";
        echo "<p>Tamaño: " . $row['Tamaño'] . "</p>";
        echo "<p>Sabor: " . $row['Sabor'] . "</p>";
        echo "<p>Ingredientes: " . $row['Ingredientes'] . "</p>";
        echo "<p>Precio: $" . $row['Precio'] . "</p>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['Imagen']) . "' alt='Imagen del postre'>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // Mostrar mensaje si no se encontraron resultados
    echo "No hay postres disponibles.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>
