<?php
session_start();
?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
        <style>
            .div-Login{
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: baseline;
                align-content: flex-start;
            }
        </style>
    </head>
    <body>
    <?php
        // Verificar si hay un mensaje de error definido en la variable de sesión
        if (isset($_SESSION['error'])) {
            echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
            // Eliminar la variable de sesión del mensaje de error para que no se muestre nuevamente
            unset($_SESSION['error']);
        }
        ?>
    <div class="div-Login">
        <div class="login-container">
            <p>¿Ya tienes cuenta?</p>
            <h2>Inicia sesíon aquí</h2>
            <form class="login-form" action="procesar-login.php" method="POST">
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" required size="30px" placeholder="Usuario"
                    required pattern="[a-zA-Z0-9_]+" minlength="7" class="input-user">
                </div>
                <div class="form-group">
                    <input type="password" id="contrasena" name="contrasena" required size="30px" placeholder="Constraseña"
                    class="input-password">
                </div>
                <div class="form-group">
                    <input type="checkbox"><label for="">Mantener sesíon iniciada</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="login-button">Iniciar Sesión</button>
                </div>
            </form>
            <p><a class="register-link" href="registro.php">Registrar</a></p>
        </div>
    </div>
    <img src="img/Group 3.png" class="img-Slogan">
    <img src="img/image 26.png" class="img-Slogan">
</body>
</html>
<?php include('footer.php');?>