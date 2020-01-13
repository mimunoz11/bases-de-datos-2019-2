<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT region FROM Comunas INNER JOIN Recursos ON Comunas.comuna = Recursos.comuna WHERE estado = 'en trámite' OR estado = 'aprobado' GROUP BY region HAVING COUNT(*) > 0;";

    #$query = "SELECT Regiones.region FROM (SELECT region FROM Comunas INNER JOIN Recursos ON Comunas.comuna = Recursos.comuna WHERE estado = 'en trámite' OR estado = 'aprobado' GROUP BY region HAVING COUNT(*) > 0) AS _regiones INNER JOIN Regiones ON _regiones.region = Regiones.region ORDER BY numero;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>Region</th>
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
