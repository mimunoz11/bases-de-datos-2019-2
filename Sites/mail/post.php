<?php include('../templates/header_mail.php');   ?>

<?php
if (!isset($_SESSION['status'])){
    echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
  } else {
$url = $api . "messages";

// check if a form was submitted
if( !empty( $_POST ) ){

// convert form data to json format
    $postArray = array(
      "content" => $_POST['content'],
      "metadata" => array(
         "sender" => $_POST["sender"],
         "receiver" => $_POST['receiver']
        )
    ); //you might need to process any other post fields you have..
    
    $options = array(
        'http' => array(
          'method'  => 'POST',
          'content' => json_encode( $postArray ),
          'header'=>  "Content-Type: application/json\r\n" .
                      "Accept: application/json\r\n"
          )
      );
      
    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result, true );

    if ($response["success"]) {
        echo "<p style='font-size:1.4rem'>" . $response["message"] . "</p>";
        $url = $api . "messages/" . $response["id"];

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
    } else {
        echo "<p style='font-size:1.4rem'>" . $response["message"] . "</p>";
    };
};
  };
?>