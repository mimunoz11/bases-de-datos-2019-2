<?php include('../templates/header_navegacion.php');   ?>
</script>
</body>
<body>




<script>


    function mostrar_mas(numero, tipo) {
        var lista = [numero, tipo]
        if (numero !== "") {
            $.post("proyecto_adicional.php", {valorAdicional: lista}, function(mensaje) {
                $("#resultadoAdicional_" + numero).html(mensaje);
            });
        } else {
            $("#resultadoAdicional_" + numero).html('');
        };
    };

    function mostrar_recursos(numero) {
        if (numero !== "") {
            $.post("proyecto_recursos.php", {valorRecursos: numero}, function(mensaje) {
                $("#resultadoRecursos_" + numero).html(mensaje);
            });
        } else {
            $("#resultadoRecursos_" + numero).html('');
        };
    };
</script>

<?php
//Archivo de conexión a la base de datos
//https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
require("../config/conexion.php");


//Variable de búsqueda
$id_proyecto = $_GET['id'];

$mensaje = "";
$colores_boton = array("aprobado" => "cuadro -verde ", "en trámite" => "cuadro -celeste", "rechazado" => "cuadro -rojo");
$colores_boton_out = array("aprobado" => "cuadro -out-verde ", "en trámite" => "cuadro -out-celeste", "rechazado" => "cuadro -out-rojo");
$colores = array("aprobado" => "var(--green)", "en trámite" => "var(--info)", "rechazado" => "var(--red)");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
$colores_tipo = array(1 => "cuadro -azul", 2 => "cuadro -verde", 3 => "cuadro -rojo");
$colores_tipo_out = array(1 => "cuadro -out-azul", 2 => "cuadro -out-verde", 3 => "cuadro -out-rojo");
//Comprueba si $consultaRecursos está seteado
if (true) {

    $query = "SELECT Proyectos.pid AS id, tipo, nombre, latitud, longitud, Proyectos.comuna, region, fecha_apertura, operativo FROM Proyectos INNER JOIN Comunas ON Proyectos.comuna = Comunas.comuna WHERE pid = :id_proyecto;";

    $result = $db_2 -> prepare($query);
    $result -> execute( array(":id_proyecto" => $id_proyecto) );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo



    //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
    if ($dataCollected === 0) {
        $mensaje = "<p><i>Sin minerales</i></p>";
    } else {
        //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
        $mensaje = "";
        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

        foreach ($dataCollected as $p) {
            $color = $colores_tipo[$p[1]];
            $color_out = $colores_tipo_out[$p[1]];
            $tipo_ = $tipo_proyecto[$p[1]];
            $mensaje = "<div class='$color' style='font-size:1.2rem;border-radius:0rem;width:100%;text-align:center'> $p[2]</div>

            <div class='container'>
            <div class='row'>
                <p class='col'><strong>Latitud:</strong> $p[3]</p>
                <p class='col'><strong>Longitud:</strong> $p[4]</p>
                <p class='col'><strong>Comuna:</strong> $p[5]</p>
                <p class='col'><strong>Región:</strong> $p[6]</p>
            </div>
            <div class='row'>
                <p class='col'><strong>Fecha apertura:</strong> $p[7]</p>
                <p class='col'><strong>Operativo: </strong> $p[8]</p>
            </div>
            <div id='resultadoAdicional_$p[0]' style='width:100%'>";

            echo $mensaje;
            $_POST['valorAdicional'] = [$p[0], $p[1]];
            $_POST['valorRecursos'] = $p[0];
            include("proyecto_adicional.php");
            include("proyecto_recursos.php");


        };

    }; //Fin else $filas

    //};
};//Fin isset $consultaRecursos

//Devolvemos el mensaje que tomará jQuery


?>


<?php include('../templates/footer_navegacion.html');   ?>
