<?php include('../templates/header_navegacion.php');   ?>
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
$id_recurso = $_GET['id'];

$mensaje = "";
$colores_boton = array("aprobado" => "cuadro -verde ", "en trámite" => "cuadro -celeste", "rechazado" => "cuadro -rojo");
$colores_boton_out = array("aprobado" => "cuadro -out-verde ", "en trámite" => "cuadro -out-celeste", "rechazado" => "cuadro -out-rojo");
$colores = array("aprobado" => "var(--green)", "en trámite" => "var(--info)", "rechazado" => "var(--red)");
$tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
$colores_tipo = array(1 => "cuadro -azul", 2 => "cuadro -verde", 3 => "cuadro -rojo");
$colores_tipo_out = array(1 => "cuadro -out-azul", 2 => "cuadro -out-verde", 3 => "cuadro -out-rojo");
//Comprueba si $consultaRecursos está seteado
if (true) {

    $query = "SELECT rid as numero, Recursos.pid as pid, nombre as proyecto, causa, area, descripcion, fecha_creacion, Recursos.comuna AS comuna, estado, tipo, region FROM Recursos INNER JOIN Comunas ON Recursos.comuna = Comunas.comuna INNER JOIN Proyectos ON Proyectos.pid = Recursos.pid WHERE rid = :id_recurso;";

    $result = $db_2 -> prepare($query);
    $result -> execute( array(":id_recurso" => $id_recurso) );
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo


    //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
    if ($dataCollected === 0) {
        $mensaje = "<p><i>Sin minerales</i></p>";
    } else {
        //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
        $mensaje = "";
        //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

        foreach ($dataCollected as $recurso) {
            $estado = $recurso[8];
            if ($estado == "aprobado" || $estado == "rechazado") {
                $consulta_fecha = "SELECT fecha_dictamen FROM dictaminados WHERE rid = :id_recurso;";
                $result = $db_2 -> prepare($consulta_fecha);
                $result -> execute( array(":id_recurso" => $id_recurso) );
                $Datos = $result -> fetchAll();
                $fecha_dictamen = $Datos[0]["fecha_dictamen"];
                $mensaje_estado = $recurso["estado"] . " (" . $fecha_dictamen . ")";
            } else {
                $mensaje_estado = $recurso["estado"];
            };
            $tipo = $recurso[9];
            $enlace = "location.replace('proyecto.php?id=$recurso[pid]')";
            $color_borde = "#e5e7e9";
            $clase_cuadro = $colores_boton[$estado];
            $clase_subcuadro = $colores_boton[$estado] . " claro";
            $enlace_proyecto = "proyecto.php?id=" . $recurso["pid"];
            $mensaje = "<div class='$colores_boton[$estado]' style='font-size:1.2rem;border-radius:0rem;width:100%;text-align:center'> Recurso contra $recurso[2]</div>";
            //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
            $mensaje .= "
            <div class='container'>
                <div class='row'>
                    <div class='col' style='padding:0.4rem'>
                            <div class='grupo-vertical' style='width:100%;height:100%'>
                                <div class='$clase_cuadro' style='width:100%'>
                                    <strong> Número </strong>
                                </div>
                                <div class='$clase_subcuadro' style='height:100%'>
                                    $recurso[0]
                                </div>
                            </div>
                    </div>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Causa </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[3]
                            </div>
                        </div>
                    </div>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Estado </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $mensaje_estado
                            </div>
                        </div>
                    </div>

                </div>
                <div class='row'>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Área de influencia </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[4] km
                            </div>
                        </div>
                    </div>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Fecha de creación </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[6]
                            </div>
                        </div>
                    </div>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Comuna </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[comuna]
                            </div>
                        </div>
                    </div>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Región </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[region]
                            </div>
                        </div>
                    </div>

                </div>
                <div class='row' style=''>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> Descripción </strong>
                            </div>
                            <div class='$clase_subcuadro' style='height:100%'>
                                $recurso[5]
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row' style=''>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%;border-bottom-left-radius:0;border-bottom-right-radius:0'>
                                <strong> Proyecto </strong>
                            </div>
                                <table style='width:100%'>

                                        <tr class='grupo' style='width:100%'> <td class='$colores_tipo[$tipo]' style='width:4rem;text-align:center;border-top-left-radius:0'> $recurso[1] </td> <td class='$colores_tipo_out[$tipo]' style='width:100%;border-top-right-radius:0'><a href=$enlace_proyecto>$recurso[2]</a></td> </tr>

                                </table>

                        </div>
                    </div>
                </div>
                <div class='row' style=''>
                    <div class='col' style='padding:0.4rem'>
                        <div class='grupo-vertical' style='width:100%;height:100%'>
                            <div class='$clase_cuadro' style='width:100%'>
                                <strong> ONGs </strong>
                            </div>

                    ";
        };

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
