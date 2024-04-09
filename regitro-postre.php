<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Postre</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function actualizarTamaño() {
            var categoria = document.getElementById("categoria").value;
            var tamañoSelect = document.getElementById("tamaño");

            // Limpiar opciones actuales
            tamañoSelect.innerHTML = '';

            // Agregar opciones según la categoría seleccionada
            if (categoria === "Galletas" || categoria === "Cupcake") {
                var opciones = ["6 Pzs", "12 Pzs"];
            } else {
                var opciones = ["Grande", "Mediano", "Chico"];
            }

            // Agregar las nuevas opciones al menú desplegable
            for (var i = 0; i < opciones.length; i++) {
                var opcion = opciones[i];
                var elemento = document.createElement("option");
                elemento.textContent = opcion;
                tamañoSelect.appendChild(elemento);
            }
        }
    </script>
</head>
<body>
    <div class="div-Registro">
        <div class="registro-container">
            <h2>Registrar Nuevo Postre</h2>
            <form class="registro-form" action="registro-postre.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" id="nombre" name="nombre" required placeholder="Nombre del postre" class="input-text">
                </div>
                <div class="form-group">
                    <select id="categoria" name="categoria" required class="input-text" onchange="actualizarTamaño()">
                        <option value="" disabled selected>Seleccione una categoría</option>
                        <option value="Pastel">Pastel</option>
                        <option value="Gelatina">Gelatina</option>
                        <option value="Cupcake">Cupcake</option>
                        <option value="Galletas">Galletas</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="tamaño" name="tamaño" required class="input-text">
                        <option value="" disabled selected>Seleccione un tamaño</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" id="sabor" name="sabor" required placeholder="Sabor" class="input-text">
                </div>
                <div class="form-group">
                    <input type="text" id="ingredientes" name="ingredientes" required placeholder="Ingredientes" class="input-text">
                </div>
                <div class="form-group">
                    <input type="number" id="precio" name="precio" required placeholder="Precio" class="input-text">
                </div>
                <div class="form-group">
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="registro-button">Registrar Postre</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php include('footer.php');?>