<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];

    $query = "SELECT id_socio AS id,
    socio AS nombre,
    COUNT(id_proyecto) AS proyectos,
    SUM(CASE WHEN recursos_en_tramite IS NOT NULL then recursos_en_tramite ELSE 0 END) AS recursos_vigentes_totales
    FROM (SELECT Socios.sid AS id_socio,
      CONCAT(Socios.nombre, ' ', apellido) AS socio,
      Asociados.pid AS  id_proyecto,
      Proyectos.nombre AS proyecto,
      SUM(CASE WHEN estado = 'en trámite' AND NOT Asociados.pid IS NULL then 1 ELSE 0 END) AS recursos_en_tramite
      FROM (Socios LEFT OUTER JOIN Asociados ON Socios.sid = Asociados.sid)
        LEFT OUTER JOIN Proyectos ON Asociados.pid = Proyectos.pid
        LEFT OUTER JOIN Recursos ON Proyectos.pid = Recursos.pid
        GROUP BY (Socios.sid, Asociados.pid, Proyectos.nombre) HAVING COUNT(*) >= 0
        ORDER BY Socios.sid ASC, recursos_en_tramite DESC) AS busqueda_1 GROUP BY id, nombre
    ORDER BY id;";
    
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Resultado</th>
          <th>Proyectos</th>
          <th>Recursos en trámite</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td>
          <td>";
            if ($p[2] != 0)
              {echo "<form align='center' action='socios_proyectos_resultados.php' method='post'>
                <input type='hidden' name='id_socio' value=$p[0]>
                <input type='hidden' name='nombre_socio' value=$p[1]>
                <button class='btn btn-primary' type='submit'> +
              </form>";
              };
            echo"
          </td> <td>$p[2]</td> <td>$p[3]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>
