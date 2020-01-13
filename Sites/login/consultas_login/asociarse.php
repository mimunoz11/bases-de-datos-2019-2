<?php session_start();?>
<?php
require("../../config/conexion.php");
$sid = $_SESSION["sid"];
$pid = $_GET["id"];

$buscarUsuario2 = "INSERT INTO asociados VALUES(:pid, :sid);";
$result2 = $db_2 -> prepare($buscarUsuario2);
$result2 -> execute( array(":pid" => $pid, ":sid" => $sid) );
$resultado2 = $result2 -> fetchAll();

if ('1' == '1'){
    header("Location: ../../navegacion/proyecto.php?id=$pid");
}
?>