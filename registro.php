<?php
// Iniciar sesión
session_start();

// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Mensaje de advertencia si es necesario iniciar sesión
$mensaje = '';
if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'inicio_sesion') {
    $mensaje = '<p style="color: red;">Debes iniciar sesión primero para acceder a esta página.</p>';
}
?>

<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        .div-Login {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: baseline;
            align-content: flex-start;
        }
    </style>
</head>
<body>
<div class="div-Login">
    <div class="login-container">
        <?php
        // Verificar si se debe mostrar el mensaje
        if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'inicio_sesion') {
            echo '<p style="color: red;">Debes iniciar sesión primero para acceder a esta página.</p>';
        }
        ?>
        <p>¿Aún no tienes cuenta?</p>
        <h2>Regístrate ahora</h2>
        <form class="login-form" action="procesar-registro.php" method="POST">
            <div class="form-group">
                <input type="text" id="usuario" name="usuario" required size="30px" placeholder="Usuario" required pattern="[a-zA-Z0-9_]+" minlength="10" class="input-user">
            </div>
            <div class="form-group">
                <input type="email" id="correo" name="correo" required size="30px" placeholder="Correo electrónico" class="input-user">
            </div>
            <div class="form-group">
                <input type="password" id="contrasena" name="contrasena" required size="30px" placeholder="Contraseña" class="input-password">
            </div>
            <div class="form-group">
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required size="30px" placeholder="Confirmar Contraseña" class="input-password">
            </div>
            <div class="form-group">
                <button type="submit" class="login-button">Registrarme</button>
            </div>
        </form>
    </div>
</div>


<img src="img/Group 3.png" class="img-Slogan">
<img src="img/image 26.png" class="img-Slogan">
</body>
</html>
<?php include('footer.php');?>
