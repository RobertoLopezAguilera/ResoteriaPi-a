<?php
// Incluir archivo de conexión a la base de datos
include('includes/conexion.php');

// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];

    // Insertar los datos en la tabla Domicilio
    $sql_domicilio = "INSERT INTO Domicilio (Calle, Numero) VALUES ('$calle', '$numero')";
    if ($conn->query($sql_domicilio) === TRUE) {
        $idEntrega = $conn->insert_id; // Obtener el ID de la entrega recién insertada

        // Obtener la fecha actual
        $fecha_pedido = date("Y-m-d");

        // Definir el estado por defecto
        $estado = "Pendiente";

        // Insertar los datos en la tabla Orden
        $sql_orden = "INSERT INTO Orden (Nombre_Cliente, Telefono_Cliente, Fecha_Entrega, Fecha_Pedido, Estado, Entrega_idEntrega) VALUES ('$nombre', '$telefono', '$fecha_entrega', '$fecha_pedido', '$estado', '$idEntrega')";
        if ($conn->query($sql_orden) === TRUE) {
            $idOrden = $conn->insert_id; // Obtener el ID de la orden recién insertada

            // Insertar datos en la tabla DetalleOrden
            if(isset($_POST['idPostre']) && is_numeric($_POST['idPostre'])) {
                $idPostre = $_POST['idPostre'];
                // Suponiendo que el total se obtiene de la base de datos, puedes realizar una consulta para obtener el precio del postre
                $sql_precio = "SELECT Precio FROM Postre WHERE idPostre = $idPostre";
                $result_precio = $conn->query($sql_precio);
                if ($result_precio->num_rows == 1) {
                    $row_precio = $result_precio->fetch_assoc();
                    $total = $row_precio['Precio'];

                    // Insertar datos en la tabla DetalleOrden
                    $sql_detalle_orden = "INSERT INTO DetalleOrden (Postre_idPostre, Orden_idOrden, Total) VALUES ($idPostre, $idOrden, $total)";
                    if ($conn->query($sql_detalle_orden) === TRUE) {
                        echo "Orden procesada correctamente.";
                    } else {
                        echo "Error al insertar en la tabla DetalleOrden: " . $conn->error;
                    }
                } else {
                    echo "No se encontró el precio del postre.";
                }
            } else {
                echo "No se proporcionó un ID de postre válido.";
            }
        } else {
            echo "Error al insertar en la tabla Orden: " . $conn->error;
        }
    } else {
        echo "Error al insertar en la tabla Domicilio: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
