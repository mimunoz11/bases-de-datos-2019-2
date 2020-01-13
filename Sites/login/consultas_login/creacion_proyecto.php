<?php session_start();?>
<?php
require("../../config/conexion.php");
$nombre_socio = $_SESSION["nombre"];
$apellido_socio = $_SESSION["apellido"];
$clave_socio = $_SESSION["clave"];
$id_socio = $_SESSION["sid"];

$nombre_proyecto = $_GET["nombre_proyecto"];
$fecha = $_GET["fecha"];
$comuna = $_GET["comuna"];
$latitud = $_GET["latitud"];
$longitud = $_GET["longitud"];
$tipo = $_GET["yesno"];
$mineral = $_GET["mineral"];
$tipo_electrica = $_GET["tipo_electrica"];
$operativo = $_GET["operativo"];

$buscarUsuario = "INSERT INTO proyectos VALUES(default, :tipo, :nombre_proyecto, :latitud,:longitud, :comuna, :fecha, :operativo) RETURNING pid;";
$result = $db_2 -> prepare($buscarUsuario);
$result -> execute( array(":tipo" => $tipo, ":nombre_proyecto" => $nombre_proyecto, ":latitud" => $latitud, ":longitud" => $longitud, ":comuna" => $comuna, ":fecha" => $fecha, ":operativo" => $operativo) );
$count = $result -> rowCount();
$resultado = $result -> fetchAll();
foreach ($resultado as $p) {
    $pid = $p[0];
};
//$count = pg_num_rows($result);
$buscarUsuario2 = "INSERT INTO asociados VALUES(:pid, :id_socio);";
$result2 = $db_2 -> prepare($buscarUsuario2);
$result2 -> execute( array(":pid" => $pid, ":id_socio" => $id_socio) );
$resultado2 = $result2 -> fetchAll();

if ($tipo == '2'){   
    $buscarUsuario3 = "INSERT INTO electricas VALUES(:pid, :tipo_electrica);";
    $result3 = $db_2 -> prepare($buscarUsuario3);
    $result3 -> execute( array(":pid" => $pid, ":tipo_electrica" => $tipo_electrica) );
    $resultado3 = $result3 -> fetchAll();
}
else if ($tipo == '1'){
    $buscarUsuario4 = "INSERT INTO minas VALUES(:pid, :mineral);";
    $result4 = $db_2 -> prepare($buscarUsuario4);
    $result4 -> execute( array(":pid" => $pid, ":mineral" => $mineral) );
    $resultado4 = $result4 -> fetchAll();
}

if ('1' == '1'){
    header("Location: ../../navegacion/proyecto.php?id=$pid");
}
?>