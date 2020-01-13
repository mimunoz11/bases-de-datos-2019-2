<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    $id_socio = $_POST["id_socio"];
    $nombre_socio = $_POST["nombre_socio"];
    $query = "SELECT id_proyecto AS id, proyecto AS nombre, recursos_en_tramite FROM (SELECT Socios.sid AS id_socio,
    CONCAT(Socios.nombre, ' ', apellido) AS socio,
    Asociados.pid AS  id_proyecto,
    Proyectos.nombre AS proyecto,
    SUM(CASE WHEN estado = 'en trámite' AND NOT Asociados.pid IS NULL then 1 ELSE 0 END) AS recursos_en_tramite
    FROM (Socios LEFT OUTER JOIN Asociados ON Socios.sid = Asociados.sid)
     LEFT OUTER JOIN Proyectos ON Asociados.pid = Proyectos.pid
     LEFT OUTER JOIN Recursos ON Proyectos.pid = Recursos.pid
     GROUP BY (Socios.sid, Asociados.pid, Proyectos.nombre) HAVING COUNT(*) >= 0
     ORDER BY Socios.sid ASC, recursos_en_tramite DESC) AS busqueda_2 WHERE id_socio = $id_socio;";
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    echo "Mostrando proyectos con recursos en trámite de $nombre_socio ($id_socio)"

    ?>



    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Recursos en trámite</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>
