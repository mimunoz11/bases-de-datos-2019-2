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
        <h6> Raul DC, Cote Garrido, Manu Muñoz & Joaco Terreros</h6>
      </a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <?php if (!isset($_SESSION['status'])){
            echo "<form method='post' action='sesiones/signin_ong.php'>
              <h6 class='text-center text-secondary mb-0'>
              <button type='submit' class='btn btn-secondary'> Ingreso ONG
            </form>
            <form method='post' action='sesiones/signin_socio.php'>
              <h6 class='text-center text-secondary mb-0'>
              <button type='submit' class='btn btn-secondary'> Ingreso Socio
            </form>";
            }
            else if ($_SESSION['status'] == 'ong'){
              echo "
              <form method='post' action='me/index.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> My Profile
              </form>
              <form method='post' action='me/planificar/index.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> Planificar
                </form>
              <form method='post' action='login/consultas_login/salir_ong.php'>
                <h6 class='text-center text-secondary mb-0'>
                <button type='submit' class='btn btn-secondary'> Cerrar Sesion Ong
              </form>";
            }
            else if ($_SESSION['status'] == 'socio'){
              echo "
                <form method='post' action='me/index.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> My Profile
                </form>
                <form method='post' action='navegacion/nuevo_proyecto.php'>
                  <h6 class='text-center text-secondary mb-0'>
                  <button type='submit' class='btn btn-secondary'> Crear Nuevo Proyecto
                </form>
                <form method='post' action='login/consultas_login/salir_socio.php'>
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

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0"> Seguimiento de todos los recursos de protección realizados a múltiples minas, centrales y vertederos</p>
      <p class="masthead-subheading font-weight-light mb-0"> #AsambleaConstituyente</p>
    </div>
  </header>



  <!-- Navegación -->
    <!-- Portfolio Section -->


    <section class="page-section portfolio" id="mail">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Mail</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>


      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-sm-12 py-1">
          <a class="card card-body h-100 text-white bg-primary d-flex justify-content-center" style="text-decoration:none" href="mail">
            <h3 class="card-title text-center text-uppercase" style="width:100%"> Ir </h3>
          </a>
        </div>



    </div>
  </section>


    <section class="page-section portfolio" id="navegacion">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Navegar</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>


      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-sm-6 py-2">
          <a class="card card-body h-100 text-white bg-primary d-flex justify-content-center" style="text-decoration:none" href="navegacion/proyectos.php">
            <h3 class="card-title text-center text-uppercase"> Proyectos</h3>
          </a>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-sm-6 py-2">
          <a class="card card-body h-100 text-white bg-primary d-flex justify-content-center" style="text-decoration:none" href="navegacion/ongs.php">
            <h3 class="card-title text-center text-uppercase"> ONGs </h3>
          </a>
        </div>


    </div>
  </section>
  <!-- Navegación hasta aquí -->


  <!-- BUSCADOR -->
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="navegacion">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Buscador</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

       <!-- PROBANDO -->
       <!-- Search form -->
      <div class="row">
        <!-- Portfolio Item 1 -->
        <div class="col-sm-4 py-2">

          <form class="form-inline" action="navegacion/busqueda_ongs.php" method="GET">
            <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca ONGs por Nombre">
            <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
          </form>

        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-sm-4 py-2">

          <form class="form-inline" action="navegacion/busqueda_proyectos.php" method="GET">
            <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca Proyectos por Nombre">
            <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
          </form>

        </div>

        <!-- Portfolio Item 3 -->
        <div class="col-sm-4 py-2">

          <form class="form-inline" action="navegacion/busqueda_recursos.php" method="GET">
            <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca Recursos por Causa">
            <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
          </form>

        </div>
      </div>

  </section>
  <!-- BUSCADOR hasta aquí -->


  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="consultas">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Consultas</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- PROBANDO -->
      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Centrales termoeléctricas</h3>
            <form align="center" action="consultas/centrales_termoelectricas.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Vertederos RM</h3>
            <form align="center" action="consultas/vertederos_metropolitana.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 3 -->
        <div class="col-sm-4 py-2">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h3 class="card-title text-center text-uppercase">Recursos asociados a minas</h3>
                    <!-- <p class="card-text"></p> -->
                    <form align="center" action="consultas/recursos_minas.php" method="post">
                      <h6 class="text-center text-secondary mb-0">
                        Desde:
                        <input type="date" id="start_search" name="fecha_a" value="2000-01-01">
                        <br><br/>
                        Hasta:
                        <input type="date" id="end_search" name="fecha_b" value="2000-01-01">
                        <br><br/>
                        <button type="submit" class="btn btn-secondary"> Buscar
                      </h6>
                    </form>
                </div>
            </div>
        </div>

        <!-- Portfolio Item 4 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Regiones con recursos vigentes</h3>
            <form align="center" action="consultas/regiones_vigente.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 5 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Proyectos de cada socio</h3>
            <form align="center" action="consultas/socios_proyectos.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar todo
              </h6>
            </form>
            <h6></h6>
            <form align="center" action="consultas/socios_proyectos_filtrado.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar solo socios con proyectos
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 6 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Proyectos operando</h3>
            <form align="center" action="consultas/proyectos_operando.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 7 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Marchas 2019</h3>
            <form align="center" action="consultas/consulta01.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 8 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Recursos Abiertos</h3>
            <form align="center" action="consultas/consulta02.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                Desde:
                <input type="date" id="start_search" name="fecha_a" value="2000-01-01">
                <br><br/>
                Hasta:
                <input type="date" id="end_search" name="fecha_b" value="2000-01-01">
                <br><br/>
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 9 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">ONGs presentan recurso contra</h3>
            <form class="form-inline" action="consultas/consulta03.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <input class="form-control col-sm-9 py-2" id="search" name="Proyecto" type="text" placeholder="Proyecto">
                <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 10 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Regiones con recursos vigentes</h3>
            <form align="center" action="consultas/consulta04.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 11 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Movilizaciones por ONG</h3>
            <form align="center" action="consultas/consulta05.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

        <!-- Portfolio Item 12 -->
        <div class="col-sm-4 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <h3 class="card-title text-center text-uppercase">Proyecto con recursos y movilizaciones vigentes</h3>
            <form align="center" action="consultas/consulta06.php" method="post">
              <h6 class="text-center text-secondary mb-0">
                <button type="submit" class="btn btn-secondary"> Buscar
              </h6>
            </form>
          </div>
        </div>

      </div>
      <!-- DEJANDO DE PROBAR -->

    </div>
  </section>
    </body>

    <body>
  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <a href="consultas/centrales_termoelectricas.php" id="portfolioModal1"></a>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Vertederos RM</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <a href="consultas/vertederos_metropolitana.php">
                  <img class="img-fluid rounded mb-5" src="img/consultas/vertederos_metropolitana.png" alt="">
                  </a>
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Mostrar vertederos de la Región Metropolitana</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Volver
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Portfolio Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/game.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/safe.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="img/portfolio/submarine.png" alt="">
                <!-- Portfolio Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="../js/jqBootstrapValidation.js"></script>
  <script src="../js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/freelancer.min.js"></script>
</body>
</html>


