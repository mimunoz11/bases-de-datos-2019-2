<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grupo 06</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- Custom fonts for this theme -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Theme CSS -->
  <link href="../css/freelancer.min.css" rel="stylesheet">

  
</head>


  

<body id="page-top">
  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">
  
        <!-- Masthead Avatar Image -->
        <!-- <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt=""> -->

  
      </div>
    </header>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/~grupo6/index.php">Grupo 06
        <h6> Cote Garrido, Joaco Terreros, Manu Muñoz & Raul DC </h6>
      </a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
              <?php if (!isset($_SESSION['status'])){
                echo "<form method='post' action='/~grupo6/sesiones/signin_ong.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> Ingreso ONG
                </form>
                <form method='post' action='/~grupo6/sesiones/signin_socio.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> Ingreso Socio
                </form>";
                }
                else if ($_SESSION['status'] == 'ong'){
                  echo "
                  <form method='post' action='/~grupo6/me/index.php'>
                      <h6 class='text-center text-secondary mb-0'>
                      <button type='submit' class='btn btn-secondary'> My Profile
                  </form>
                  <form method='post' action='/~grupo6/me/planificar/index.php'>
                      <h6 class='text-center text-secondary mb-0'>
                      <button type='submit' class='btn btn-secondary'> Planificar
                    </form>
                  <form method='post' action='/~grupo6/login/consultas_login/salir_ong.php'>
                    <h6 class='text-center text-secondary mb-0'>
                    <button type='submit' class='btn btn-secondary'> Cerrar Sesion Ong
                  </form>";
                }
                else if ($_SESSION['status'] == 'socio'){
                  echo "
                    <form method='post' action='/~grupo6/me/index.php'>
                      <h6 class='text-center text-secondary mb-0'>
                      <button type='submit' class='btn btn-secondary'> My Profile
                    </form>
                    <form method='post' action='/~grupo6/navegacion/nuevo_proyecto.php'>
                      <h6 class='text-center text-secondary mb-0'>
                      <button type='submit' class='btn btn-secondary'> Crear Nuevo Proyecto
                    </form>
                    <form method='post' action='/~grupo6/login/consultas_login/salir_socio.php'>
                      <h6 class='text-center text-secondary mb-0'>
                      <button type='submit' class='btn btn-secondary'> Cerrar Sesion Socio
                    </form>";
                };
                ?>
              </li>
        </ul>
      </div>
    </div>
  </nav>






