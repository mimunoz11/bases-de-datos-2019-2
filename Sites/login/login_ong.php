<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grupo 06</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- Custom fonts for this theme -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../css/freelancer.min.css" rel="stylesheet">

  <style>
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  </style>

</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Grupo 06
        <h6> Joaco Terreros, Manu Muñoz, Raul DC & Cote Garrido</h6>
      </a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <form method="post" action="../index.php">
              <h6 class="text-center text-secondary mb-0">
              <button type="submit" class="btn btn-secondary"> Volver
            </form>
            <form method="post" action="consultas_login/registro_ong.php">
              <h6 class="text-center text-secondary mb-0">
              <button type="submit" class="btn btn-secondary"> Registrarse
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">

        <!-- Masthead Avatar Image -->
        <!-- <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt=""> -->

        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0"> Sistema de Tramitación Ambiental de Chile</h1>

        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>
        <div <p class="masthead-subheading font-weight-light mb-0"> Ingresa el nombre de la ONG</p></div>
          <form method="post" action="consultas_login/ingreso_ong.php">
            <input type="text" name="nombre">
            <div class="divider-custom-line"></div>
            <h6 class="text-center text-secondary mb-0">
            <button type="submit" class="btn btn-secondary"> Ingresar
          </form>
        </div>


        <!-- Masthead Subheading
        <p class="masthead-subheading font-weight-light mb-0"> Ingresa el nombre de la ONG</p>
        <input type="text" name="nombre">
        <br/>
        <form method="post" action="">
          <h6 class="text-center text-secondary mb-0">
          <button type="submit" class="btn btn-secondary"> Ingresar -->
      </div>
    </header>
    </section>

    </body>
  <?php

    echo $_POST['username'];
  ?>
