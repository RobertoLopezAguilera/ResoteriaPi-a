<?php
    include('header.php');
    include('includes/conexion.php');

    if (isset($_POST['idOrden']) && is_numeric($_POST['idOrden'])) {
        $idOrden = $_POST['idOrden'];
        $sql_orden = "SELECT * FROM Orden WHERE idOrden = $idOrden";
        $result_orden = $conn->query($sql_orden);
        if ($result_orden->num_rows > 0) {
            $row_orden = $result_orden->fetch_assoc();
            $nombreCliente = $row_orden['Nombre_Cliente'];
            $telefonoCliente = $row_orden['Telefono_Cliente'];
            $fechaEntrega = $row_orden['Fecha_Entrega'];
            $estado = $row_orden['Estado'];
            $fechaPedido = $row_orden['Fecha_Pedido'];

            // Mostrar los detalles de la orden
            echo "<div class='div-Login'>";
            echo "<div class='login-container'>";
            echo "<h2>Detalles de la Orden</h2>";
            echo "<form action='actualizar-estado.php' method='post'>"; // Formulario para actualizar el estado
            echo "<input type='hidden' name='idOrden' value='$idOrden'>";
            echo "<p>Nombre del Cliente: $nombreCliente</p>";
            echo "<p>Teléfono del Cliente: $telefonoCliente</p>";
            echo "<p>Fecha de Entrega: $fechaEntrega</p>";
            echo "<p>Estado actual: $estado</p>";
            echo "<label for='nuevoEstado'>Seleccionar nuevo estado:</label>";
            echo "<select name='nuevoEstado' id='nuevoEstado'>";
            echo "<option value='Pendiente'".($estado == 'Pendiente' ? ' selected' : '').">Pendiente</option>"; // Marcar la opción actual como seleccionada
            echo "<option value='Preparación'".($estado == 'Preparación' ? ' selected' : '').">Preparación</option>"; // Marcar la opción actual como seleccionada
            echo "<option value='Entregado'".($estado == 'Entregado' ? ' selected' : '').">Entregado</option>"; // Marcar la opción actual como seleccionada
            echo "</select>";
            echo "<br><br>";
            echo "<input type='submit' class='btn btn-primary' value='Guardar'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

            // Obtener los detalles del postre pedido
            $sql_detalle = "SELECT * FROM DetalleOrden WHERE Orden_idOrden = $idOrden";
            $result_detalle = $conn->query($sql_detalle);

            // Verificar si se encontraron detalles del postre
            if ($result_detalle->num_rows > 0) {
                $row_detalle = $result_detalle->fetch_assoc();
                $idPostre = $row_detalle['Postre_idPostre'];

                // Obtener los detalles del postre de la base de datos
                $sql_postre = "SELECT * FROM Postre WHERE idPostre = $idPostre";
                $result_postre = $conn->query($sql_postre);
                if ($result_postre->num_rows > 0) {
                    $row_postre = $result_postre->fetch_assoc();
                    $nombrePostre = $row_postre['Nombre'];
                    $precioPostre = $row_postre['Precio'];
                    $imagenPostre = $row_postre['Imagen'];
                    echo"<div class='login-container'>";
                    echo "<h2>Postre pedido</h2>";
                    echo "<p>Nombre del Postre: $nombrePostre</p>";
                    echo "<p>Precio: $precioPostre</p>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($imagenPostre).'" style="max-width: 200px;" />';
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "No se encontró el postre asociado a esta orden.";
                }
            } else {
                echo "No se encontraron detalles del postre para esta orden.";
            }
        } else {
            echo "No se encontró la orden con el ID proporcionado.";
        }
    } else {
        echo "ID de orden no válido.";
    }

    $conn->close();
    include('footer.php');
?>
