<?php
// Ruta de la imagen que deseas convertir a base64
$ruta_imagen = "C:/Postres/Pastel 1.JPEG";

// Obtener el contenido de la imagen
$contenido_imagen = file_get_contents($ruta_imagen);

// Convertir el contenido de la imagen a base64
$imagen_base64 = base64_encode($contenido_imagen);

// Conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = "root"; // Cambiar por tu nombre de usuario
$password = "root123"; // Cambiar por tu contraseña
$database = "ReposPiña"; // Cambiar si es necesario

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar la imagen en la base de datos
$sql = "INSERT INTO Postre (Nombre, Categoria, Tamaño, Sabor, Ingredientes, Precio, Estado, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Unir los parámetros a la consulta SQL
$stmt->bind_param("sssssisb", $nombre, $categoria, $tamaño, $sabor, $ingredientes, $precio, $estado, $imagen_base64);

// Asignar valores a los parámetros
$nombre = "Nombre del postre";
$categoria = "Categoría del postre";
$tamaño = "Tamaño del postre";
$sabor = "Sabor del postre";
$ingredientes = "Ingredientes del postre";
$precio = 100; // Precio del postre
$estado = "Disponible"; // Estado del postre

// Ejecutar la consulta SQL
$stmt->execute();

// Cerrar la conexión
$conn->close();

// Mensaje de éxito
echo "La imagen se ha convertido y almacenado en la base de datos correctamente.";
?>
