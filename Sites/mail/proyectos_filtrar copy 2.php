<?php
if (!isset($_SESSION['status'])){
    echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
  } else {
$api = "http://api-bdd-grupo06.herokuapp.com/";
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$consultaBusqueda = implode(",", $_POST['valorBusqueda']);

//Filtro anti-XSS
//$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
//$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
//$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$colores = array(1 => "cuadro -azul ", 2 => "cuadro -verde", 3 => "cuadro -rojo");
$colores_out =  array(1 => "cuadro -out-azul ", 2 => "cuadro -out-verde", 3 => "btn -out-rojo");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
//Comprueba si $consultaBusqueda está seteado
$tiempo = time();
$url = $api . "messages";
$context  = stream_context_create( $options );
$result = file_get_contents( $url );
$response = json_decode( $result, true );

$proyectos = array();
foreach ($response as $k){
    $proyecto = $k["metadata"]["sender"];
    if (!$proyectos[$proyecto]) {
        $proyectos[$proyecto] = $proyecto;
    };
};
$nombres = array();
$numeros = array();
$num = 0;
foreach ($proyectos as $val) {
    $nombres[":" . $num] = $val;
    array_push($numeros, ":" . $num);
    $num += 1;
};
$proyectos = "(" . join(",", $numeros) . ")";
$tiempo = time() - $tiempo;
echo "<tr><td>hola</td><td>$tiempo</td><td>hola</td></tr>";
$tiempo = $time;

if (isset($consultaBusqueda)) {
    
    $url = $api . "messages/project-search?nombre=";
    
    //$context  = stream_context_create( $options );
        
	$query = "SELECT Proyectos.pid AS id, tipo, nombre, latitud, longitud, Proyectos.comuna, region, fecha_apertura, operativo FROM Proyectos INNER JOIN Comunas ON Proyectos.comuna = Comunas.comuna WHERE tipo IN ($consultaBusqueda) AND nombre IN $proyectos";
    $result = $db_2 -> prepare($query);
    $result -> execute( $nombres );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($dataCollected === 0) {
		$mensaje = "<p>No hay proyectos que mostrar</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        foreach ($dataCollected as $p) {
            $enlace = $url . urlencode($p[2]);
            //echo "<tr><td>$enlace</td><td>hola</td><td>hola</td></tr>";
            $resultado = file_get_contents( $enlace );
            $response = json_decode( $resultado, true );
            $veces = 0;
            foreach ($response as $k){
                $proyecto = $k["metadata"]["sender"];
                if ($p[2] == $proyecto) {
                    $veces += 1;
                };
            };
            $color = $colores[$p[1]];
            $color_out = $colores_out[$p[1]];
            $tipo_ = $tipo_proyecto[$p[1]];
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            echo "<tr value='$p[0]' name='$p[1]' onClick='mostrar($p[0])'> <td class='$color' style='width:4rem' >$p[0]</td> <td>$p[2]</td> <td>$veces</td> <td style='display:none'><a id='enlace_$p[0]' href='proyecto.php?id=$p[0]'></a></td></tr>";
            echo "<tr style='display:none' id='proyecto_$p[0]' name='$p[1]'><td colspan='3'><div>
            <div class='container'>
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
                

            </div>
            </div>
            
            </div></td></tr>";
          };

	}; //Fin else $filas

};//Fin isset $consultaBusqueda
echo "<tr><td>hola</td><td>$tiempo</td><td>hola</td></tr>";
  };
//Devolvemos el mensaje que tomará jQuery

?>