<?php
include('includes/conexion.php');

// Verificar si se enviaron datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $tamaño = $_POST['tamaño'];
    $sabor = $_POST['sabor'];
    $ingredientes = $_POST['ingredientes'];
    $precio = $_POST['precio'];
    // Procesar la imagen
    $imagen = $_FILES['imagen']['tmp_name'];
    $imagenContenido = addslashes(file_get_contents($imagen));

    // Preparar la consulta SQL
    $sql = "INSERT INTO Postre (Nombre, Categoria, Tamaño, Sabor, Ingredientes, Precio, Imagen) VALUES (?, ?, ?, ?, ?, ? ,?)";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sssssis", $nombre, $categoria, $tamaño, $sabor, $ingredientes, $precio,$imagenContenido);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Postre registrado con éxito, redirigir al usuario a alguna página de éxito o mostrar un mensaje de éxito
        header("Location: index.php?registro=exito");
        exit();
    } else {
        // Error al registrar el postre, mostrar un mensaje de error o redirigir al usuario de vuelta al formulario de registro con un mensaje de error
        header("Location: form-postre.php?error=registro");
        exit();
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder a esta página directamente sin enviar datos desde el formulario, redirigir al usuario a la página de registro
    header("Location: index.php");
    exit();
}
?>
