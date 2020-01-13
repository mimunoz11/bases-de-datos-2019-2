<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
      $p = $_POST["Proyecto"];
    $query = "SELECT Ong.nombre
      FROM Ong, Recursodeong, Recurso, Proyecto
      WHERE Ong.nombre = Recursodeong.nombre_ong
      AND Recursodeong.id_recurso = Recurso.id
      AND Recurso.nombre_proyecto = Proyecto.nombre
      AND Proyecto.nombre = '$p';";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>Nombre</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>