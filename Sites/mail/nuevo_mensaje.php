<?php include('../templates/header_mail.php');   ?>

<?php
if (!isset($_SESSION['status'])){
  echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
} else {
    require("../config/conexion.php");

    $query = "SELECT nombre FROM Proyectos ORDER BY nombre;";

    $result = $db_2 -> prepare($query);
    $result -> execute( );
    $dataCollected = $result -> fetchAll();
    $proyectos = "";
    foreach ($dataCollected as $proyecto) {
        $proyectos .= "<option value=\"$proyecto[0]\">$proyecto[0]</option>";
    };

?>

<div class="row justify-content-md-center">
        <!-- Portfolio Item 1 -->
        <div class="col-sm-6 py-2">
          <div class="card card-body h-200 text-white bg-primary d-flex justify-content-center">
            

<form name="postform" action="post.php" method="post" enctype="multipart/form-data">
<label for='de'>De </label>
<select id="de" class='custom-select mb-2 mr-sm-2 mb-sm-0' name="sender">     <option value="">Elegir proyecto que envía el mensaje...</option><?php echo $proyectos; ?></select>
<label for='para'>Para </label>
<select id="para" class='custom-select mb-2 mr-sm-2 mb-sm-0' name="receiver"><option value="">Elegir proyecto que recibe el mensaje...</option><?php echo $proyectos; ?></select>
<label for='contenido'>Contenido </label>
<textarea id="contenido" class="form-control text required" type="text" name="content" required></textarea>
<br/>
<div class="col text-center">
                  <button type="submit" class="btn btn-secondary" style="8rem">Enviar</button>
                </div>

</form>
</form>

</div></div></div>
  <?php };?>