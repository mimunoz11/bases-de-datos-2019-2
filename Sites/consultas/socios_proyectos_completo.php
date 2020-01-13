<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT Socios.sid AS id_socio,
      CONCAT(Socios.nombre, ' ', apellido) AS socio,
      Asociados.pid AS  id_proyecto,
      Proyectos.nombre AS proyecto,
      COUNT(estado) AS recursos_en_tramite
      FROM (Socios INNER JOIN Asociados ON Socios.sid = Asociados.sid)
      INNER JOIN Proyectos ON Asociados.pid = Proyectos.pid
      INNER JOIN Recursos ON Proyectos.pid = Recursos.pid
      WHERE estado = 'en trámite'
      GROUP BY (Socios.sid, Asociados.pid, Proyectos.nombre)
      HAVING COUNT(*) > 0
      ORDER BY Socios.sid ASC,
      recursos_en_tramite DESC;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>SID</th>
          <th>SOCIO</th>
          <th>PID</th>
          <th>Proyecto</th>
          <th>Recursos en trámite</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>
