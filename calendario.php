<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$mensaje = '';
if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'inicio_sesion') {
    $mensaje = '<p style="color: red;">Debes iniciar sesión primero para acceder a esta página.</p>';
}
?>
<?php
if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'inicio_sesion') {
    echo '<p style="color: red;">Debes iniciar sesión primero para acceder a esta página.</p>';
}
    include('includes/conexion.php');
    $sql = "SELECT idOrden, Estado, Fecha_Entrega FROM Orden";
    $result = $conn->query($sql);
    $eventos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $color = '';
            switch ($row['Estado']) {
                case 'Pendiente':
                    $color = '#FFA500';
                    break;
                case 'Preparación':
                    $color = '#FFFF00';
                    break;
                case 'Entregado':
                    $color = '#008000';
                    break;
                default:
                    $color = '#007bff';
            }

            $evento = [
                'id' => $row['idOrden'],
                'title' => $row['Estado'],
                'start' => $row['Fecha_Entrega'],
                'color' => $color,
            ];
            $eventos[] = $evento;
        }
    }
    $conn->close();
?>

<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <style>
        .containerCalendar {
            background-image: linear-gradient(to left, rgb(169, 240, 245), rgb(255, 172, 248), #e3f1ff);
        }
    </style>
</head>
<body>
    <div class="containerCalendar">
        <div class="col-md-10 offset-md-1">
            <div id='calendar'></div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                },
                events: <?php echo json_encode($eventos); ?>,
                eventClick: function(info) {
                    console.log(info.event.id);
                    var form = document.createElement('form');
                    form.method = 'post';
                    form.action = 'detalles-orden.php';
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'idOrden';
                    input.value = info.event.id;
                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
            calendar.render();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include('footer.php'); ?>
