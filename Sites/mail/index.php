<?php include('../templates/header_mail.php');   ?>
<?php 
    if (isset($_SESSION['status'])){

        if ($_SESSION['status'] == 'socio'){
            echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! " . ucwords($_SESSION['nombre'] . " " .  $_SESSION['apellido']) . "</p>"; 

            
        } else if ($_SESSION['status'] == 'ong'){
            echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! " . ucwords($_SESSION['nombre']) . "</p>"; 
    
        };
        
        echo "<p style='font-size:1.2rem;text-align:center'>
        A continuación, te explicaremos algunas de las funcionales de la mensajería, a la que puedes acceder a través de la barra superior.
        </p>"; 

        ?>

<table class="table">
      <!--thead class="thead-primary">
        <tr>
          <th>Sección</th>
          <th></th>
        </tr>
      </thead-->
      <tbody>
        <tr>
            <td>
                <a href="">Mail</a>
            </td>
            <td>
                Página actual, contiene descripciones de las funcionalidades.
            </td>
        </tr>
        <tr>
            <td>
                <a href="mensajes.php">Ver todos los mensajes</a>
            </td>
            <td>
                Permite ver una lista completa de los mensajes de la base de datos.
            </td>
        </tr>
        <tr>
            <td>
                <a href="nuevo_mensaje.php">Nuevo mensaje</a>
            </td>
            <td>
                Permite ingresar un nuevo mensaje a la base de datos.
            </td>
        </tr>
        <tr>
            <td>
                <a href="socio_mas.php">Socios</a>
            </td>
            <td>
                Permite encontrar el socio que ha enviado más correos a través de sus proyectos, y cuyo contenido incluye ciertas palabras claves.
            </td>
        </tr>
        <tr>
            <td>
                <a href="proyectos.php">Proyectos</a>
            </td>
            <td>
                Lista de proyectos con más mensajes enviados. Utiliza la lista de mensajes + <i>project-search</i> (puede ser más lento).
            </td>
        </tr>
        <tr>
            <td>
                <a href="proyectos_mas.php">Proyectos (v2)</a>
            </td>
            <td>
                Lista de proyectos con más mensajes enviados. Utiliza solo la lista de mensajes, otorgando mayor rapidez al momento de mostrar el listado.
            </td>
        </tr>
      </tbody>
    </table>
    <?php
    } else {
        echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
    };












?>