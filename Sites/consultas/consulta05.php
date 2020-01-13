<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT Ong.nombre, Movilizacion.tipo, Movilizacion.presupuesto
    FROM Ong JOIN Movilizacion ON Ong.nombre = Movilizacion.ong
    ORDER BY Ong.nombre ASC , Movilizacion.presupuesto DESC;";
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
