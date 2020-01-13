<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">

  <!-- Custom fonts for this theme -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">

  <!-- Estilo Personalizado -->
  <link href="../../css/custom_style.css" rel="stylesheet">

<?php 

require("../../config/conexion.php");
$comuna = $_GET["comuna"];

$query = "SELECT Aprobados.pid, Rechazados.nombre, cantidad_aprobados as si, cantidad_rechazados as no, movilizaciones as mov  
FROM (
    SELECT Proyectos.pid as pid, Proyectos.nombre as nombre, COUNT(Recursos.rid) as cantidad_aprobados 
    FROM Proyectos INNER JOIN Recursos ON Proyectos.pid = Recursos.pid 
    WHERE Proyectos.comuna = :comuna AND estado = 'aprobado' 
    GROUP BY Proyectos.pid
) AS Aprobados 
INNER JOIN (
    SELECT Proyectos.pid as pid, Proyectos.nombre, COUNT(Recursos.rid) as cantidad_rechazados
    FROM Proyectos INNER JOIN Recursos ON Proyectos.pid = Recursos.pid 
    WHERE Proyectos.comuna = :comuna AND estado = 'rechazado' 
    GROUP BY Proyectos.pid
) AS Rechazados 
ON Aprobados.pid = Rechazados.pid
INNER JOIN (
    SELECT Proyectos.pid, Proyectos.nombre, Movilizacion.movilizaciones FROM Proyectos INNER JOIN 
    (SELECT * FROM dblink('dbname=grupo6 host=localhost port=5432 
    user=grupo6 password=grupo6',
    'SELECT proyecto, COUNT(id) FROM Movilizacion GROUP BY proyecto') 
    AS Movilizacion(proyecto TEXT, movilizaciones integer)) AS Movilizacion
    ON Proyectos.nombre = Movilizacion.proyecto WHERE comuna = :comuna
) AS Movilizaciones 
ON Movilizaciones.pid = Aprobados.pid
WHERE cantidad_rechazados > cantidad_aprobados OR movilizaciones < 60;";
$result = $db_2 -> prepare($query);
$result -> execute( array(":comuna" => $comuna) );
$dataCollected = $result -> fetchAll();


$mensaje = "
<table class='table' style='width:100%;padding:0rem'>
<thead class='thead-primary'>
    <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Aprobados</th>
    <th>Rechazados</th>
    <th>Movilizaciones</th>
    </tr>
</thead>
<tbody>";
foreach ($dataCollected as $p) {

$mensaje .= "
<tr>
<td>$p[0]</td>
<td>$p[1]</td>
<td>$p[2]</td>
<td>$p[3]</td>
<td>$p[4]</td>
</tr>";};
echo $mensaje; 
?>
