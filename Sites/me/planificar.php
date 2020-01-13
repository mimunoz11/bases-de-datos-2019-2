<?php session_start();?>
<?php include('../templates/header_navegacion.html');   ?>
<?php 

if (isset($_SESSION["status"])) {
    if ($_SESSION["status"] == "ong") {
        echo "<div class='cuadro -azul' style='width:100%;text-align:center'>
            Planificación
            </div>";


    } else {
        echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola! Para poder planificar movilizaciones, ¡puedes iniciar sesión como ONG!
            </div>";
    };
} else {
    echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola! Para poder planificar movilizaciones, ¡puedes iniciar sesión como ONG!
            </div>";
};