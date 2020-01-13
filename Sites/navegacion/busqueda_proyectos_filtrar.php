
<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$consultaBusqueda = implode(",", $_POST['valorBusqueda']);
$nombre_buscado = $_POST['busqueda'];



//Filtro anti-XSS
//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
//$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
//$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$colores = array(1 => "cuadro -azul", 2 => "cuadro -verde", 3 => "cuadro -rojo");
$colores_out =  array(1 => "cuadro -out-azul ", 2 => "cuadro -out-verde", 3 => "btn -out-rojo");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {
	$query = "SELECT Proyectos.pid AS id, tipo, nombre, latitud, longitud, Proyectos.comuna, region, fecha_apertura, operativo FROM Proyectos INNER JOIN Comunas ON Proyectos.comuna = Comunas.comuna WHERE LOWER(Proyectos.nombre) LIKE LOWER('%$nombre_buscado%') AND tipo IN ($consultaBusqueda);";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($dataCollected === 0) {
		$mensaje = "<p>No hay proyectos que mostrar</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        foreach ($dataCollected as $p) {
            $color = $colores[$p[1]];
            $color_out = $colores_out[$p[1]];
            $tipo_ = $tipo_proyecto[$p[1]];
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            $mensaje .= "<tr value='$p[0]' onClick='mostrar($p[0])'> <td class='$color' style='width:4rem' >$p[0]</td> <td>$p[2]</td> <td style='display:none'><a id='enlace_$p[0]' href='proyecto.php?id=$p[0]'></a></td></tr>";
            $mensaje .= "<tr style='display:none' id='proyecto_$p[0]' name='$p[1]'><td colspan='2'><div>
            <div class='container'>";
                
            $mensaje .= "
                <div class='row'>
                    <p class='col'><strong>Latitud:</strong> $p[3]</p>
                    <p class='col'><strong>Longitud:</strong> $p[4]</p>
                    <p class='col'><strong>Comuna:</strong> $p[5]</p>
                    <p class='col'><strong>Región:</strong> $p[6]</p>
                </div>
                <div class='row'>
                    <p class='col'><strong>Fecha apertura:</strong> $p[7]</p>
                    <p class='col'><strong>Operativo: </strong> $p[8]</p> 
                </div>
                <div id='resultadoAdicional_$p[0]' style='width:100%'></div>
                <div class='$color_out' style='width:100%;text-align:center;font-size:1.2rem'> <span style='float:left'>Recursos</span> <div class='grupo' style='float:right'><span class='cuadro -verde'> <span class='full-text'>aprobado</span> <span class='short-text fa fa-check'></span></span><span class='cuadro -celeste'> <span class='full-text'>en trámite</span> <span class='short-text fa fa-clock'></span> </span><span class='cuadro -rojo'> <span class='full-text'>rechazado</span> <span class='short-text fa fa-times'></span> </span></div></div>
                <div id='resultadoRecursos_$p[0]' style='width:100%'></div>


            </div>
            </div>
            
            </div></td></tr>";
          };

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>