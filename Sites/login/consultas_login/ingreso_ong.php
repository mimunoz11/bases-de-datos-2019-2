<?php session_start();?>
<?php
require("../../config/conexion.php");
$usuario = $_GET["usuario"];
$clave = $_GET["clave"];

$buscarUsuario = "SELECT * FROM Ong WHERE LOWER(Ong.nombre) = LOWER('$usuario') AND LOWER(Ong.password) = LOWER(md5('$clave'));";
$result = $db -> prepare($buscarUsuario);
$result -> execute();
$count = $result -> rowCount();
$resultado = $result -> fetchAll();
//$count = pg_num_rows($result);

if ($count == 1){
    // initialize session variables
    $_SESSION['usuario'] = $usuario;
    $_SESSION['clave'] = $clave;
    $_SESSION['status'] = 'ong';

    foreach ($resultado as $datos_ong) {
        $_SESSION["nombre"] = $datos_ong[0];
    };

    header("Location: ../../index.php");
}
else{
    header("Location: ../../sesiones/signin_ong.php?error=1");
}
?>