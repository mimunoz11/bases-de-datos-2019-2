<?php session_start();?>
<?php include('../../templates/header_me.php');   ?>
<?php 

if (isset($_SESSION["status"])) {
    if ($_SESSION["status"] == "ong") {
        echo "<div class='cuadro -azul' style='width:100%;text-align:center'>
            Planificación
            </div>";
            require("../../config/conexion.php");

            $comuna = $_POST["comuna"];
            $presupuesto = intval($_POST["presupuesto"]);
            $nombre_ong = $_SESSION["nombre"];

            $query = "SELECT id, ong, proyecto, presupuesto, tipo, fecha, estimacion, lugar, tipo_contenido, duracion FROM planificar(:presupuesto, :comuna, :nombre_ong);";
            $result = $db_2 -> prepare($query);
            $result -> execute( array(":presupuesto" => $presupuesto, ":comuna" => $comuna, ":nombre_ong" => $nombre_ong) );
            $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
            
            
        
            //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
            if ($dataCollected === 0) {
                $mensaje = "<p><i>Sin minerales</i></p>";
            } else {
                //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
                $mensaje = "";
                //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
                
                $mensaje = "
                    <table class='table' style='width:100%;padding:0rem'>
                    <thead class='thead-primary'>
                        <tr>
                        <th>ID</th>
                        <th>ONG</th>
                        <th>Proyecto</th>
                        <th>Presupuesto</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Estimación</th>
                        <th>Lugar</th>
                        <th>Contenido</th>
                        <th>Duración</th>
                        </tr>
                    </thead>
                    <tbody>";
                foreach ($dataCollected as $p) {

                    $mensaje .= "
                    <tr>
                    <td>$p[0]</td>
                    <td>$p[1]</td>
                    <td>$p[2]</td>
                    <td>$p[3]</td>
                    <td>$p[4]</td>
                    <td>$p[5]</td>
                    <td>$p[6]</td>
                    <td>$p[7]</td>
                    <td>$p[8]</td>
                    <td>$p[9]</td>
                    <td>$p[10]</td>
                    </tr>";};
                echo $mensaje; };
                    




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