<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a la página principal
header("Location: login.php"); // Cambia 'login.php' por la ruta de la página que desees
exit();
?>
