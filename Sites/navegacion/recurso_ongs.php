<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


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

    $query = "SELECT nombre_ong FROM recursodeong WHERE id_recurso = :id_recurso;";

    $result = $db -> prepare($query);
    $result -> execute( array(":id_recurso" => $id_recurso) );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    

    //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
    if ($dataCollected === 0) {
        $mensaje = "<p><i>Sin datos</i></p>";
    } else {
        //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje

        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        $mensaje = "<table style='width:100%'>
        <!--thead class='thead-primary'>
            <tr>
            <th>ID</th>
            <th>Causa</th>
            </tr>
        </thead-->
        <tbody class='grupo-vertical' style='width:100%;border-top-left-radius:0;border-top-right-radius:0'>";
                        

        foreach ($dataCollected as $ong) {
            #$estado = $recurso[2];
            #$numero = $recurso[0];
            $nombre_ong = $ong["nombre_ong"];
            #$enlace = "location.replace('recurso.php?id=$numero')";
            $enlace = "location.replace('ong.php?id=" . $nombre_ong . "')";
            $formato_nombre = str_replace(" ", "%20", str_replace("'", "'", $nombre_ong));
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            $mensaje .= "
            <tr  class='grupo' style='width:100%'> 
                <td class='$colores_boton_out[$estado]' style='width:100%;background-color:#fff;border-top-left-radius:0;border-top-right-radius:0'><a href=ong.php?id=($formato_nombre)>$ong[0]</a></td>
            </tr>";
        };
        $mensaje .= "</tbody></table>";

    }; //Fin else $filas

    //};
};//Fin isset $consultaRecursos

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>