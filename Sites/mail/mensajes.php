<?php include('../templates/header_mail.php');   ?>

<?php
if (!isset($_SESSION['status'])){
  echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
} else {
if (!$_GET["id"]){
$url = $api . "messages";

//https://programacion.net/articulo/como_enviar_y_recibir_datos_json_mediante_php_curl_1885

$options = array(
    'http' => array(
      'method'  => 'GET',
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
  );
  
    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result, true );

    
    
    //print_r($proyectos);
    ?>


    <table class="table">
      <thead class="thead-primary">
      </thead>
      <tbody>
        <?php
        foreach ($response as $k){
          $id = $k["id"];
          $contenido = $k["content"];
          $sender = $k["metadata"]["sender"];
          $receiver = $k["metadata"]["receiver"];
          $time = $k["metadata"]["time"];
          echo "<tr>
                <td style='width:3rem;text-align:center;background-color:var(--blue);border:none;color:#fff'><a href='?id=$id' style='color:#fff'><span>$id</span></a></td>
                  <td>
                        <p style='margin:0'><strong> De: </strong>$sender</p>
                        <p><strong> Para: </strong>$receiver</p>
                    <p>$contenido</p>
                    <p style='margin:0'>$time</p>
                  </td>
                </tr>";
        };
        ?>
      </tbody>
    </table>


<?php
} else {
  $url = $api . "messages/" . $_GET["id"];

//https://programacion.net/articulo/como_enviar_y_recibir_datos_json_mediante_php_curl_1885

        $options = array(
            'http' => array(
            'method'  => 'GET',
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );
        
            $context  = stream_context_create( $options );
            $result = file_get_contents( $url, false, $context );
            $respuesta = json_decode( $result, true );
            ?>
            <table class="table">
                <thead class="thead-primary">
                </thead>
                <tbody>
                    <?php
                    foreach ($respuesta as $k){
                    $id = $k["id"];
                    $contenido = $k["content"];
                    $sender = $k["metadata"]["sender"];
                    $receiver = $k["metadata"]["receiver"];
                    $time = $k["metadata"]["time"];
                    echo "<tr>
                            <td style='width:3rem;text-align:center;background-color:var(--blue);border:none;color:#fff'><a href='#page-top' style='color:#fff'>$id</a></td>
                            <td>
                                    <p style='margin:0'><strong> De: </strong>$sender</p>
                                    <p><strong> Para: </strong>$receiver</p>
                                <p>$contenido</p>
                                <p style='margin:0'>$time</p>
                            </td>
                            </tr>";
                    };
                    ?>
                </tbody>
                </table> <?php
};
};
?>