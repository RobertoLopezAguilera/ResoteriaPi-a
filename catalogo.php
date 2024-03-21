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
// Verificar si se ha seleccionado una categoría
if(isset($_GET['categoria'])) {
    // Obtener la categoría seleccionada
    $categoria = $_GET['categoria'];
    // Mostrar la categoría seleccionada
    echo "<h2>Postres de la categoría: $categoria</h2>";
    // Consulta SQL para obtener los postres de la categoría seleccionada
    $sql = "SELECT * FROM Postre WHERE Categoria='$categoria'";
} else {
    // Consulta SQL para obtener todos los postres
    $sql = "SELECT * FROM Postre";
    // Mostrar mensaje para indicar que se están mostrando todos los postres
    echo "<h2>Ver todos los postres</h2>";
}

include('includes/conexion.php');
$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
    echo "No hay postres disponibles.";
}
$conn->close();
?>

</body>
</html>
