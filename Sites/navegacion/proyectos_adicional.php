<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$consultaAdicional = $_POST['valorAdicional'][0];
$consultaTipo = $_POST['valorAdicional'][1];

//Filtro anti-XSS
//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
//$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
//$consultaAdicional = str_replace($caracteres_malos, $caracteres_buenos, $consultaAdicional);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$colores = array(1 => "btn -azul ", 2 => "btn -verde", 3 => "btn -rojo");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
//Comprueba si $consultaAdicional está seteado
if (true) {
    if ($consultaTipo == "1") {
        $query = "SELECT mineral FROM Minas WHERE pid = $consultaAdicional";
    
        $result = $db_2 -> prepare($query);
        $result -> execute();
        $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
        

        //Si no existe ninguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje
        if ($dataCollected === 0) {
            $mensaje = "<p><i>Sin tipo</i></p>";
        } else {
            //Si existe alguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -azul'><strong style='font-size:1.2rem'>Minera </strong></div> <div class='cuadro -out-azul'> <strong style='margin-right:1rem'>Minerales:</strong> <div>";
            foreach ($dataCollected as $p) {
                //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                $mensaje .= "<div class='cuadro -out-azul' style='vertical-align:top;margin-top:0rem'>$p[0]</div>";
            };
            $mensaje .= "</div></div></div>";

        }; //Fin else $filas
    } else if ($consultaTipo == "2") {
        $query = "SELECT tipo_generacion FROM Electricas WHERE pid = $consultaAdicional";
    
        $result = $db_2 -> prepare($query);
        $result -> execute();
        $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
        

        //Si no existe ninguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje
        if ($dataCollected === 0) {
            $mensaje = "<p><i>Sin minerales</i></p>";
        } else {
            //Si existe alguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -verde'><strong style='font-size:1.2rem'> Eléctrica </strong></div> <div class='cuadro -out-verde'> <strong style='margin-right:1rem'>Tipo:</strong> <div >";
            foreach ($dataCollected as $p) {
                //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                $mensaje .= "<div class='cuadro -out-verde' style='vertical-align:top;margin-top:0rem'>$p[0]</div>";
            };
            $mensaje .= "</div></div></div>";

        }; //Fin else $filas
    } else if ($consultaTipo=="3") {
        //Si existe alguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -rojo'><strong style='font-size:1.2rem'> Vertedero </strong></div>";// <div class='cuadro -out-rojo'> <strong style='margin-right:1rem'></strong> <div>";
            //$mensaje .= "<div style='vertical-align:top;margin-top:0rem'></div>";
            $mensaje .= "</div>";//</div></div>";

    };
    //};
};//Fin isset $consultaAdicional

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>