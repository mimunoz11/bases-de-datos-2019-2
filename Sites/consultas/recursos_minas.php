<?php include('../templates/header_consultas.php');   ?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	#$fecha_a = implode("-", array_reverse(explode("-", $_POST["fecha_a"])));
    #$fecha_b = implode("-", array_reverse(explode("-", $_POST["fecha_b"])));

    $fecha_a = $_POST["fecha_a"];
    $fecha_b = $_POST["fecha_b"];

 	$query = "SELECT Recursos.rid as numero, nombre as proyecto, causa, area, fecha_creacion, Recursos.comuna AS comuna, estado FROM Recursos INNER JOIN Proyectos ON Recursos.pid = Proyectos.pid WHERE tipo = 1 AND fecha_creacion >= '$fecha_a' AND fecha_creacion <= '$fecha_b' ORDER BY fecha_creacion;";
	$result = $db_2 -> prepare($query);
	$result -> execute();
	$recursos = $result -> fetchAll();
  ?>

  <table class="table">
    <thead class="thead-primary">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Causa</th>
        <th>Área</th>
        <th>Fecha creación</th>
        <th>Comuna</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($recursos as $recurso) {
          echo "<tr> <td>$recurso[0]</td> <td>$recurso[1]</td> <td>$recurso[2]</td> <td>$recurso[3]</td> <td>$recurso[4]</td> <td>$recurso[5]</td> <td>$recurso[6]</td> </tr>";
      }
      ?>
    </tbody>
  </table>

<?php include('../templates/footer_consultas.html');   ?>
