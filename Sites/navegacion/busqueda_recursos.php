<?php include('../templates/header_navegacion.php');   ?>
<!-- PROBANDO -->
<!-- Search form -->
<div class="row">
<!-- Portfolio Item 1 -->
<div class="col-sm-4 py-2">

  <form class="form-inline" action="/~grupo6/navegacion/busqueda_ongs.php" method="GET">
    <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca ONGs por Nombre">
    <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
  </form>

</div>

<!-- Portfolio Item 2 -->
<div class="col-sm-4 py-2">

  <form class="form-inline" action="/~grupo6/navegacion/busqueda_proyectos.php" method="GET">
    <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca Proyectos por Nombre">
    <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
  </form>

</div>

<!-- Portfolio Item 3 -->
<div class="col-sm-4 py-2">

  <form class="form-inline" action="/~grupo6/navegacion/busqueda_recursos.php" method="GET">
    <input class="form-control col-sm-9 py-2" id="search" name="busqueda" type="text" placeholder="Busca Recursos por Causa">
    <input class="btn btn-secondary" id="submit" type="submit" value="Buscar">
  </form>
</div>
</div>
</script>
</body>

<script>
    function mostrar_ongs(numero) {
        if (numero !== "") {
            $.post("recurso_ongs.php", {id_recurso: numero}, function(mensaje) {
                $("#mostrar_ongs").html(mensaje);
            });
        } else {
            $("#mostrar_ongs").html('');
            };
    };

    function ir_ong(nombre) {
        window.location = "ong.php?id=" + nombre;
    };
</script>


<body>


<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$id_recurso = $_GET['busqueda'];

$mensaje = "";
$colores_boton = array("aprobado" => "cuadro -verde ", "en trámite" => "cuadro -celeste", "rechazado" => "cuadro -rojo");
$colores_boton_out = array("aprobado" => "cuadro -out-verde ", "en trámite" => "cuadro -out-celeste", "rechazado" => "cuadro -out-rojo");
$colores = array("aprobado" => "var(--green)", "en trámite" => "var(--info)", "rechazado" => "var(--red)");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
$colores_tipo = array(1 => "cuadro -azul", 2 => "cuadro -verde", 3 => "cuadro -rojo");
$colores_tipo_out = array(1 => "cuadro -out-azul", 2 => "cuadro -out-verde", 3 => "cuadro -out-rojo");
//Comprueba si $consultaRecursos está seteado
    //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
if (true) {

        $query = "SELECT rid as numero, causa, estado FROM Recursos WHERE LOWER(causa) LIKE LOWER('%$id_recurso%')";

        $result = $db_2 -> prepare($query);
        $result -> execute();
        $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo


        //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
        if ($dataCollected === 0) {
            $mensaje = "<p><i>Sin minerales</i></p>";
        } else {
            //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje = "<table class='table'>
            <thead class='thead-primary'>
                <tr>
                <th>ID</th>
                <th>Causa</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($dataCollected as $recurso) {
                $estado = $recurso[2];
                $numero = $recurso[0];
                $enlace = "location.replace('recurso.php?id=$numero')";
                //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                $mensaje .= "<tr onClick=$enlace> <td style='width:13rem;text-align:center;background-color:$colores[$estado];color:#fff'>$recurso[0]</td> <td>$recurso[1]</td></tr>";
            };
            $mensaje .= "</tbody></table>";

    }; //Fin else $filas

    //};
};//Fin isset $consultaRecursos

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
include('recurso_ongs.php');
echo "
</div>
</div>
</div>
</div>";
?>


<?php include('../templates/footer_navegacion.html');   ?>
