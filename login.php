<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
    <div>
        <div class="login-container">
            <p>¿Ya tienes cuenta?</p>
            <h2>Inicia sesíon aquí</h2>
            <form class="login-form" action="procesar-login.php" method="POST">
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" required size="30px" placeholder="Usuario"
                    required pattern="[a-zA-Z0-9_]+" minlength="10" class="input-user">
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
            <p><a class="register-link" href="registro.html">Olvide mi contraseña</a></p>
        </div>
        <div class="login-container">
            <p>¿Aún no tienes cuenta?</p>
            <h2>Resgistrate ahora</h2>
            <form class="login-form" action="procesar-login.php" method="POST">
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" required size="30px" placeholder="Usuario"
                    required pattern="[a-zA-Z0-9_]+" minlength="10" class="input-user">
                </div>
                <div class="form-group">
                    <input type="password" id="contrasena" name="contrasena" required size="30px" placeholder="Constraseña"
                    class="input-password">
                </div>
                <div class="form-group">
                    <input type="password" id="contrasena" name="contrasena" required size="30px" placeholder="Confierma Constraseña"
                    class="input-password">
                </div>
                <div class="form-group">
                    <button type="submit" class="login-button">Resgistrarme</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>