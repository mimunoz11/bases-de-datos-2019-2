<?php
if (!isset($_SESSION['status'])){
    echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
  } else {
$api = "http://api-bdd-grupo06.herokuapp.com/";
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda

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
$response_ = json_decode( $result, true );

$proyectos = array();
$nombres = array();
$numeros = array();
$num = 0;
$url = $api . "messages/project-search?nombre=";
foreach ($response_ as $correo){
    $proyecto = $correo["metadata"]["sender"];
    if (!$proyectos[$proyecto]) {
        $proyectos[$proyecto] = $proyecto;
        $enlace = $url . urlencode($proyecto);
        $resultado = file_get_contents( $enlace );
        $response = json_decode( $resultado, true );
        $veces = 0;
        foreach ($response as $k){
            $proyecto_ = $k["metadata"]["sender"];
            if ($proyecto == $proyecto_) {
                $veces += 1;
            };
        };
        $nombres[":" . $num] = $proyecto;
        array_push($numeros, "(:" . $num . ", " . $veces . ")");
        $num += 1;
    };
};



$proyectos = join(", ", $numeros);
//$tiempo = time() - $tiempo;
//echo "<tr><td>hola</td><td>$tiempo</td><td>hola</td></tr>";
//$tiempo = time();


if (true) {
    
    $url = $api . "messages/project-search?nombre=";
    
    //$context  = stream_context_create( $options );
    $query = "drop table if exists busca_proyectos;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $query = "CREATE TEMP TABLE busca_proyectos(nombre VARCHAR, numero INT);";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $query = "insert into busca_proyectos values$proyectos;";
    $result = $db_2 -> prepare($query);
    $result -> execute( $nombres );
	$query = "SELECT Proyectos.pid AS id, tipo, Proyectos.nombre, latitud, longitud, fecha_apertura, operativo, numero as correos FROM Proyectos INNER JOIN busca_proyectos ON Proyectos.nombre=busca_proyectos.nombre ORDER BY correos DESC";

    $result = $db_2 -> prepare($query);
    $result -> execute( );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($dataCollected === 0) {
		$mensaje = "<p>No hay proyectos que mostrar</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
        foreach ($dataCollected as $p) {
            $veces = 0;
            $color = $colores[$p[1]];
            $color_out = $colores_out[$p[1]];
            $tipo_ = $tipo_proyecto[$p[1]];
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            echo "<tr value='$p[0]' name='$p[1]' onClick='mostrar($p[0])'> <td class='$color' style='width:4rem' >$p[0]</td> <td>$p[2]</td> <td>$p[7]</td> <td style='display:none'><a id='enlace_$p[0]' href='../navegacion/proyecto.php?id=$p[0]'></a></td></tr>";
            echo "<tr style='display:none' id='proyecto_$p[0]' name='$p[1]'><td colspan='3'><div>
            <div class='container'>
                <div class='row'>
                    <p class='col'><strong>Fecha apertura:</strong> $p[5]</p>
                    <p class='col'><strong>Operativo: </strong> $p[6]</p> 
                </div>
                

            </div>
            </div>
            
            </div></td></tr>";
          };

	}; //Fin else $filas

};//Fin isset $consultaBusqueda
//$tiempo = time() - $tiempo;

//echo "<tr><td>hola</td><td>$tiempo</td><td>hola</td></tr>";

//Devolvemos el mensaje que tomará jQuery
  };
?>