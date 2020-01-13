<?php include('../templates/header_consultas.php');   ?>
</body>
<body>
  <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT * FROM Marcha, Movilizacion WHERE Marcha.id = Movilizacion.id AND EXTRACT(year FROM Movilizacion.fecha) = 2019;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>

    <table class="table">
      <thead class="thead-primary">
        <tr>
          <th>ID</th>
          <th>Estimación</th>
          <th>Lugar</th>
          <th>Presupuesto</th>
          <th>Tipo</th>
          <th>Fecha</th>
          <th>Ong</th>
          <th>Proyecto</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> <td>$p[8]</td> </tr>";
        }
        ?>
      </tbody>
    </table>

<?php include('../templates/footer_consultas.html');   ?>