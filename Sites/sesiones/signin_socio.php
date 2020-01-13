<?php include('../templates/header_navegacion.php');   
  $error = '0';
  if ($_GET['error'] == '1'){
  $error = $_GET['error'];
  };
  ?>

  <!-- SIGN IN SOCIO -->
    <!-- Portfolio Section -->
    <section class="page-section portfolio" id="signin_socio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Sign In SOCIO</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>


      <div class="row justify-content-md-center">
        <!-- Portfolio Item 1 -->
        <div class="col-sm-6 py-2">
          <div class="card card-body h-100 text-white bg-primary d-flex justify-content-center">
            <form action="../login/consultas_login/ingreso_socios.php?error=<?php echo $error?>" method="GET">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre Socio">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp" placeholder="Apellido Socio">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Password">
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
                <?php 
                if ($error == '1'){
                  echo 'DATOS INCORRECTOS';
                };
                ?>
            </form>
            </div>
        </div>

    </div>
  </section>
  <!-- SIGN IN SOCIO hasta aquí -->

<?php include('../templates/footer_navegacion.html');   ?>
