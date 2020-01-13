<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT Proyectos.pid as id, nombre, latitud, longitud, Proyectos.comuna, fecha_apertura, operativo, COUNT(rid) AS recursos_aprobados FROM Proyectos INNER JOIN Recursos ON Proyectos.pid = Recursos.pid WHERE operativo = 'si' AND estado = 'aprobado' GROUP BY Proyectos.pid ORDER BY id;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Latitud</th>
          <th>Longitud</th>
          <th>Comuna</th>
          <th>Fecha de apertura</th>
          <th>Operativo</th>
          <th>Recursos aprobados</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>
