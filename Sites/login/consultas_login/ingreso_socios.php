<?php session_start();?>
<?php
require("../../config/conexion.php");
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$clave = $_GET["clave"];

$buscarUsuario = "SELECT * FROM socios WHERE LOWER(nombre) = LOWER('$nombre') AND LOWER(apellido) = LOWER('$apellido') AND LOWER(socios.password) = LOWER(md5('$clave'));";
$result = $db_2 -> prepare($buscarUsuario);
$result -> execute();
$count = $result -> rowCount();
$resultado = $result -> fetchAll();

if ($count == 1){
    // initialize session variables
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['clave'] = $clave;
    $_SESSION['status'] = 'socio';

    foreach ($resultado as $datos_socio) {
        $_SESSION["sid"] = $datos_socio[0];
    };

    header("Location: ../../index.php");
}
else{
header("Location: ../../sesiones/signin_socio.php?error=1");
}
?>