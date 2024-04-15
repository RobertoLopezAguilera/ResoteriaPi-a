<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Orden</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        .div-Login {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: baseline;
            align-content: flex-start;
        }

        .input-text {
            box-shadow: inset #e571c7 0 0 0 2px;
            border: 0;
            background: rgba(255, 255, 255);
            appearance: none;
            width: 100%;
            position: relative;
            border-radius: 0px;
            padding: 0px 0px;
            line-height: 1.4;
            color: rgb(0, 0, 0);
            font-size: 16px;
            font-weight: 400;
            height: 40px;
            transition: all .2s ease;
            border-radius: 10px;

            :hover {
                box-shadow: 0 0 0 0 #fff inset, #1de9b6 0 0 0 2px;
            }

            :focus {
                background: #fff;
                outline: 0;
                box-shadow: 0 0 0 0 #fff inset, #1de9b6 0 0 0 3px;
            }
        }

        .postre-info {
            text-align: center;
        }

        .postre-info img {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .postre-info h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="div-Login">
        <div class="login-container">
        <div class="postre-info">
                <h2>Detalles de tu postre</h2>
                <?php
                include('includes/conexion.php');

                if(isset($_POST['idPostre']) && is_numeric($_POST['idPostre'])) {
                    $idPostre = $_POST['idPostre'];
                    $sql = "SELECT Nombre, Precio, Imagen FROM Postre WHERE idPostre = $idPostre";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<h3>" . $row['Nombre'] . "</h3>";
                        echo "<p>Precio: $" . $row['Precio'] . "</p>";
                        echo "<img src='data:image/jpeg;base64," . base64_encode($row['Imagen']) . "' alt='Imagen del pastel'>";
                    } else {
                        echo "No se encontró información del pastel.";
                    }
                } else {
                    echo "No se proporcionó un ID de pastel válido.";
                }

                $conn->close();
                ?>
            </div>
        </div>
        <div class="login-container">
            <h2>Ordenar</h2>
            <form action="procesar-orden.php" method="POST" onsubmit="return validarFecha()">
                <div class="form-group">
                    <label for="nombre">Nombre del Cliente:</label>
                    <input type="text" id="nombre" name="nombre" class="input-text" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono del Cliente:</label>
                    <input type="tel" id="telefono" name="telefono" class="input-text" required>
                </div>
                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega:</label>
                    <input type="date" id="fecha_entrega" name="fecha_entrega" class="input-text" required>
                </div>
                <div class="form-group">
                    <label for="calle">Calle:</label>
                    <input type="text" id="calle" name="calle" class="input-text" required>
                </div>
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" class="input-text" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Orden</button>
            </form>
        </div>
    </div>

    <script>
        function validarFecha() {
            var fechaEntrega = document.getElementById('fecha_entrega').value;
            var hoy = new Date();
            var fechaSeleccionada = new Date(fechaEntrega);
            var tresDiasDespues = new Date();
            tresDiasDespues.setDate(hoy.getDate() + 3);

            if (fechaSeleccionada < tresDiasDespues) {
                alert('La fecha de entrega debe ser al menos 3 días en el futuro.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
<?php include('footer.php'); ?>
