<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT Proyecto.nombre, Movilizacion.tipo, Movilizacion.presupuesto
      FROM Proyecto
      JOIN Movilizacion ON Proyecto.nombre = Movilizacion.proyecto
      WHERE Proyecto.nombre IN (
          SELECT Proyecto.nombre FROM Proyecto JOIN Recurso ON
          Proyecto.nombre = Recurso.nombre_proyecto WHERE Recurso.estatus = 'en
          trámite'
      )
      AND Movilizacion.id IN (
          (SELECT Marcha.id FROM Movilizacion JOIN Marcha ON
          Movilizacion.id = Marcha.id WHERE Movilizacion.fecha > NOW())
          UNION
          (SELECT Movilizacion.id FROM Movilizacion JOIN Movredsocial
          ON Movilizacion.id = Movredsocial.id WHERE (CURRENT_DATE -
          Movilizacion.fecha) <= Movredsocial.duracion)
      );";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

<table class="table">
      <thead class="thead-primary">
        <tr>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Presupuesto</th>
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

</body>
</html>

