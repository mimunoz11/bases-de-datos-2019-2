<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");

$tabla_recursos = "tabla_recursos";
if (!(isset($nombre_ong))) {
    $nombre_ong = substr($_GET['id'], 1, strlen($_GET['id']) - 2);
    $tabla_recursos = "tabla_recursos_" . str_replace(" ", "%20", str_replace("'", "&quot", $nombre_ong));
};

//Variable de búsqueda

//Filtro anti-XSS
//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
//$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
//$consultaRecursos = str_replace($caracteres_malos, $caracteres_buenos, $consultaRecursos);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$colores_boton = array("aprobado" => "cuadro -verde ", "en trámite" => "cuadro -secundarioo", "rechazado" => "cuadro -rojo");
$colores = array("aprobado" => "var(--green)", "en trámite" => "var(--info)", "rechazado" => "var(--red)");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
//Comprueba si $consultaRecursos está seteado
if (true) {

    $query = "SELECT g06_recursosdeong.id_recurso as id_recurso, g23_recursos.causa as causa, g23_recursos.estado as estado 
    FROM recursodeong AS g06_recursosdeong INNER JOIN
    dblink('dbname=$databaseName_2 host=localhost port=5432 user=$user_2 password=$password_2','SELECT rid, causa, estado FROM Recursos') AS g23_recursos(rid VARCHAR(80), causa VARCHAR(80), estado VARCHAR(20))
    ON g06_recursosdeong.id_recurso = g23_recursos.rid WHERE g06_recursosdeong.nombre_ong = :nombre_ong;";

    $result = $db -> prepare($query);
    $result -> execute( array(":nombre_ong" => $nombre_ong) );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    

    //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
    if ($dataCollected === 0) {
        $mensaje = "<p><i>Sin datos</i></p>";
    } else {
        //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje

        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        $mensaje = "
        <script>
            function ir_recurso(numero) {
                document.getElementById('enlace_recurso_' + numero).click();
            };
        </script>
        
        <table class='table' id=$tabla_recursos style='width:100%;padding:0rem'>
        <thead class='thead-primary'>
            <tr>
            <th>ID</th>
            <th>Causa</th>
            </tr>
        </thead>
        <tbody>";

        foreach ($dataCollected as $recurso) {
            $estado = $recurso["estado"];
            $numero = $recurso["id_recurso"];
            $enlace = "location.replace('recurso.php?id=$numero')";
            $funcion_ir = "ir(recurso,$numero)";
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            $mensaje .= "<tr onClick=ir_recurso('$numero')> <td style='width:13rem;text-align:center;background-color:$colores[$estado];color:#fff'>$recurso[id_recurso]</td> <td>$recurso[causa]</td><td style='display:none'><a id='enlace_recurso_$numero'  href='/~grupo6/navegacion/recurso.php?id=$numero' ></a></td></tr>";
        };
        $mensaje .= "</tbody></table>";

    }; //Fin else $filas

    //};
};//Fin isset $consultaRecursos

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>