<?php session_start();
unset($_SESSION['nombre']);
unset($_SESSION['apellido']);
unset($_SESSION['clave']);
unset($_SESSION['status']);
unset($_SESSION['sid']);
session_destroy();
header("Location: ../../index.php");
?>