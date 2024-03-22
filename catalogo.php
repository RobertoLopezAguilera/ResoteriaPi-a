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
$sql = "SELECT * FROM Postre WHERE 1=1";

//filtro de búsqueda por nombre
if(isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
    $sql .= " AND Nombre LIKE '%$buscar%'";
}

//filtro de categoría
if(isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $sql .= " AND Categoria='$categoria'";
}

//filtro de precio
if(isset($_GET['precio'])) {
    $precio = $_GET['precio'];
    $sql .= " AND Precio < $precio";
}

//filtro de tamaño
if(isset($_GET['tamaño'])) {
    $tamaño = $_GET['tamaño'];
    $sql .= " AND Tamaño='$tamaño'";
}

//filtro de sabor
if(isset($_GET['sabor'])) {
    $sabor = $_GET['sabor'];
    $sql .= " AND Sabor='$sabor'";
}

//conexión a la base de datos
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
    echo "No se encontraron postres.";
}

// Cerrar la conexión
$conn->close();
?>

</body>
</html>
