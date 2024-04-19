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
<?php include('header.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Calendario</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
        <style>
            .containerCalendar{
                background-image: linear-gradient(to left, rgb(169, 240, 245), rgb(255, 172, 248), #e3f1ff);
            }
        </style>
    </head>

    <body>
    <?php
        if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'inicio_sesion') {
            echo '<p style="color: red;">Debes iniciar sesión primero para acceder a esta página.</p>';
        }
        ?>
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
                locale:'es',
                headerToolbar:{
                    left:'prev,next today',
                    center:'title',
                    right:'dayGridMonth,timeGridWeek'
                }
            });
            calendar.render();
            });
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
<?php include('footer.php');?>

