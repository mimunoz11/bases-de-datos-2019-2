<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");

$tabla_movilizaciones = "tabla_movilizaciones";
if (!(isset($nombre_ong))) {
    $nombre_ong = substr($_GET['id'], 1, strlen($_GET['id']) - 2);
    $tabla_movilizaciones = "tabla_movilizaciones_" . str_replace(" ", "%20", str_replace("'", "&quot", $nombre_ong));
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
$colores_movilizaciones = array("marcha" => "var(--green)", "redes sociales" => "var(--blue)");
//Comprueba si $consultaRecursos está seteado
if (true) {

    $query = "SELECT id, presupuesto, proyecto, tipo FROM movilizacion WHERE ong = :nombre_ong;";

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
        <table class='table' id='$tabla_movilizaciones' style='display:none;width:100%;padding:0rem'>
        <thead class='thead-primary'>
            <tr>
            <th>ID</th>
            <th>Presupuesto</th>
            <th>Proyecto</th>
            </tr>
        </thead>
        <tbody>";

        foreach ($dataCollected as $movilizacion) {
            $id_movilizacion = $movilizacion["id"];
            $presupuesto = $movilizacion["presupuesto"];
            $nombre_proyecto = $movilizacion["proyecto"];
            $tipo = $movilizacion["tipo"];
            $color_movilizacion = $colores_movilizaciones[$tipo];
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            $mensaje .= "<tr> <td style='width:4rem;text-align:center;background-color:$color_movilizacion;color:#fff'>$id_movilizacion</td> <td>$presupuesto</td><td>$nombre_proyecto</td></tr>";
        };
        $mensaje .= "</tbody></table>";

    }; //Fin else $filas

    //};
};//Fin isset $consultaRecursos

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>