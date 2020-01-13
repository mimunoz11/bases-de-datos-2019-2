<?php include('../templates/header_mail.php');   ?>
     
<?php
if (!isset($_SESSION['status'])){
  echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
} else {
$url = $api . "messages/content-search";

//https://programacion.net/articulo/como_enviar_y_recibir_datos_json_mediante_php_curl_1885
$data = array(
    "forbidden" => "clausurado",
	"desired" => "",
	"required" => "recurso de protección"
  );

$options = array(
    'http' => array(
      'method'  => 'GET',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
  );
  
    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result, true );

    $proyectos = array();
    foreach ($response as $k){
        $proyecto = $k["metadata"]["sender"];
        if (array_key_exists($proyecto, $proyectos)) {
            $proyectos[$proyecto] += 1;
        } else {
            $proyectos[$proyecto] = 1;
        };
    };
    
    //print_r($proyectos);
    $lista = array();
    $numero = 0;
    $nombres = array();
    foreach ($proyectos as $k => $v){
        array_push($lista, "(:" . $numero . ", " . $v . ")");
        $nombres[":" . strval($numero)] = $k;
        $numero += 1;
    };
    $listado = join(", ", $lista);
    

    
//select socios.sid, socios.nombre, apellido, SUM(numero) from socios inner join asociados on socios.sid=asociados.sid inner join (select pid, proyectos.nombre, numero from proyectos inner join buscaproyectos on proyectos.nombre = buscaproyectos.nombre) as resultados_busqueda on asociados.pid=resultados_busqueda.pid group by socios.sid;
//select socios.sid, socios.nombre, apellido, SUM(numero) from socios inner join asociados on socios.sid=asociados.sid inner join (select pid, proyectos.nombre, numero from proyectos inner join buscaproyectos on proyectos.nombre = buscaproyectos.nombre) as resultados_busqueda on asociados.pid=resultados_busqueda.pid group by socios.sid order by sum desc;
//insert into buscaproyectos values('Franke', 1), ('Azul S.A.', 1), (' AdvisorShares Market Adaptive Unconstrained Income ETF', 2);
//drop table if exists buscaproyectos;
//CREATE TEMP TABLE buscaproyectos(nombre VARCHAR, numero INT);


    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "drop table if exists buscaproyectos;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $query = "CREATE TEMP TABLE buscaproyectos(nombre VARCHAR, numero INT);";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $query = "insert into buscaproyectos values$listado;";
    $result = $db_2 -> prepare($query);
    $result -> execute( $nombres );
    $query = "select socios.sid, socios.nombre, apellido, nacionalidad, SUM(numero) from socios inner join asociados on socios.sid=asociados.sid inner join (select pid, proyectos.nombre, numero from proyectos inner join buscaproyectos on proyectos.nombre = buscaproyectos.nombre) as resultados_busqueda on asociados.pid=resultados_busqueda.pid group by socios.sid order by sum desc;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
     
    $primero = $dataCollected[0];
    $primero_nombre = $primero[1] . " " . $primero[2];
    $primero_nacionalidad = $primero[3];
    $primero_cantidad = $primero[4];
    echo "<div style='text-align:center'>";
    echo "<p style='font-size:1.4rem'>El socio con más correos que contengan <strong>recurso de protección</strong>, pero no <strong>clausurado</strong> y enviados a través de sus proyectos corresponde a:</p>";
    echo "<p style='font-size:2rem'>$primero_nombre, de nacionalidad $primero_nacionalidad, con $primero_cantidad correos enviados</p>";
    echo "</div>";
    ?>


    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Nacionalidad</th>
          <th>Correos enviados</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td></tr>";
        }
        ?>
      </tbody>
    </table>
      <?php }; ?>