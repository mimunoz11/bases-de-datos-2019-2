<?php session_start() ?>
<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$consultaAdicional = $_POST['valorAdicional'][0];
$consultaTipo = $_POST['valorAdicional'][1];
$colores_out =  array("1" => "cuadro -out-azul ", "2" => "cuadro -out-verde", "3" => "cuadro -out-rojo");
$colores_ =  array("1" => "cuadro -azul ", "2" => "cuadro -verde", "3" => "cuadro -rojo");

//Filtro anti-XSS
//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
//$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
//$consultaAdicional = str_replace($caracteres_malos, $caracteres_buenos, $consultaAdicional);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$colores = array(1 => "btn -azul ", 2 => "btn -verde", 3 => "btn -rojo");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
$color_out = $colores_[$consultaTipo]; //. "' style='color-background:#fff";
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
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -azul' style='border-bottom-left-radius:0rem'><strong style='font-size:1.2rem'>Minera </strong></div> <div class='cuadro -out-azul' style='border-bottom-right-radius:0rem'> <strong style='margin-right:1rem'>Minerales:</strong> <div>";
            foreach ($dataCollected as $p) {
                //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                $mensaje .= "<div class='cuadro -out-azul' style='vertical-align:top;margin-top:0rem'>$p[0]</div>";
            };
            $mensaje .= "</div></div></div><div class='cuadro -azul' style='width:100%;border-top-left-radius:0rem;border-top-right-radius:0rem'>";

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
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -verde' style='border-bottom-left-radius:0rem'><strong style='font-size:1.2rem'> Eléctrica </strong></div> <div class='cuadro -out-verde' style='border-bottom-right-radius:0rem'> <strong style='margin-right:1rem'>Tipo:</strong> <div >";
            foreach ($dataCollected as $p) {
                //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                $mensaje .= "<div class='cuadro -out-verde' style='vertical-align:top;margin-top:0rem'>$p[0]</div>";
            };
            $mensaje .= "</div></div></div><div class='cuadro -verde' style='width:100%;border-top-left-radius:0rem;border-top-right-radius:0rem'>";

        }; //Fin else $filas
    } else if ($consultaTipo=="3") {
        //Si existe alguna fila que sea igual a $consultaAdicional, entonces mostramos el siguiente mensaje

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje = "<div class='grupo' style='width:100%'><div class='cuadro -rojo' style='border-bottom-left-radius:0rem;border-bottom-right-radius:0rem'><strong style='font-size:1.2rem'> Vertedero </strong></div>";// <div class='cuadro -out-rojo'> <strong style='margin-right:1rem'></strong> <div>";
            //$mensaje .= "<div style='vertical-align:top;margin-top:0rem'></div>";
            $mensaje .= "</div><div class='cuadro -rojo' style='width:100%;border-top-left-radius:0rem;border-top-right-radius:0rem'>";//</div></div>";

    };
    $mensaje .= "
 
    <strong style='font-size:1.2rem'>Socios:</strong> 
    ";
    $id_proyecto =  $consultaAdicional;

    $ids_socios = array();
    $query_socios = "select asociados.sid as _sid, socios.nombre as _nombre, apellido as _apellido from asociados inner join socios on asociados.sid = socios.sid where pid = $id_proyecto;";
    $result_socios = $db_2 -> prepare($query_socios);
    $result_socios -> execute();
    $dataCollected_socios = $result_socios -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

    foreach ($dataCollected_socios as $p_socio) {
        $mensaje .= "<span style='margin-left:1rem;margin-right:1rem' class='$color_out'>$p_socio[_nombre] $p_socio[_apellido] ($p_socio[_sid])</span>";
        array_push($ids_socios, $p_socio["_sid"]);
    };
    //$mensaje .= implode($ids_socios, ',');
    $mensaje.= "";
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'socio') {
            if (!in_array($_SESSION["sid"], $ids_socios)) {
                $mensaje .= "
                    
                        <div  style='width:100%'> <a class='btn btn-secondary'  style='' href='../login/consultas_login/asociarse.php?id=$id_proyecto'> Asociarse </a> </div>
                    
                    ";
            };
        };
    };
    $mensaje .= "</div></div></div>";
    
    //};
};//Fin isset $consultaAdicional

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>