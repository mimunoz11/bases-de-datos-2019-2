<?php session_start();?>
<?php include('../templates/header_navegacion.php');   ?>
<?php 

if (isset($_SESSION["status"])) {
    if ($_SESSION["status"] == "ong") {
        echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola! Te damos la bienvenida ONG
            </div>";
        


        echo "
        <script>
        function mostrar_recursos() {
            var color = '#17a2b8';
            tabla_recursos = document.getElementById('tabla_recursos');
            tabla_movilizaciones = document.getElementById('tabla_movilizaciones');
            cuadro_tipos_recursos = document.getElementById('tipos_recursos');
            cuadro_tipos_movilizaciones = document.getElementById('tipos_movilizaciones');
            tabla_recursos.style.display = 'table';
            tabla_movilizaciones.style.display = 'none';
            boton_recursos = document.getElementById('boton_recursos');
            boton_movilizaciones = document.getElementById('boton_movilizaciones');
            boton_recursos.style.color = '#fff';
            boton_recursos.style.backgroundColor = color;
            boton_movilizaciones.style.color = color;
            boton_movilizaciones.style.backgroundColor = '#fff';
            cuadro_tipos_recursos.style.display = 'inline-flex';
            cuadro_tipos_movilizaciones.style.display = 'none';
        };
        function mostrar_movilizaciones() {
            var color = '#17a2b8';
            tabla_recursos = document.getElementById('tabla_recursos');
            cuadro_tipos_recursos = document.getElementById('tipos_recursos');
            tabla_movilizaciones = document.getElementById('tabla_movilizaciones');
            cuadro_tipos_movilizaciones = document.getElementById('tipos_movilizaciones');
            tabla_recursos.style.display = 'none';
            tabla_movilizaciones.style.display = 'table';
            boton_recursos = document.getElementById('boton_recursos');
            boton_movilizaciones = document.getElementById('boton_movilizaciones');
            boton_recursos.style.color = color;
            boton_recursos.style.backgroundColor = '#fff';
            boton_movilizaciones.style.color = '#fff';
            boton_movilizaciones.style.backgroundColor = color;
            cuadro_tipos_recursos.style.display = 'none';
            cuadro_tipos_movilizaciones.style.display = 'inline-flex';
        };
    </script>


    <body>";


    
    //Archivo de conexión a la base de datos
    //https://mimentevuela.wordpress.com/2015/08/09/busqueda-instantanea-con-ajax-php-y-mysql/
    require("../config/conexion.php");


    //Variable de búsqueda
    $nombre_ong = $_SESSION["nombre"];

    $mensaje = "";
    $colores_boton = array("aprobado" => "cuadro -verde ", "en trámite" => "cuadro -celeste", "rechazado" => "cuadro -rojo");
    $colores_boton_out = array("aprobado" => "cuadro -out-verde ", "en trámite" => "cuadro -out-celeste", "rechazado" => "cuadro -out-rojo");
    $colores = array("aprobado" => "var(--green)", "en trámite" => "var(--info)", "rechazado" => "var(--red)");
    $tipo_proyecto = array(1 => "Mina", 2 => "Eléctrica", 3 => "Vertedero");
    $colores_tipo = array(1 => "cuadro -azul", 2 => "cuadro -verde", 3 => "cuadro -rojo");
    $colores_tipo_out = array(1 => "cuadro -out-azul", 2 => "cuadro -out-verde", 3 => "cuadro -out-rojo");
    //Comprueba si $consultaRecursos está seteado
    if (true) {

        $query = "SELECT nombre, pais, descripcion FROM ong WHERE nombre = :nombre_ong;";

        $result = $db -> prepare($query);
        $result -> execute( array(":nombre_ong" => $nombre_ong) );
        $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
        

        //Si no existe ninguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
        if ($dataCollected === 0) {
            $mensaje = "<p><i>Sin minerales</i></p>";
        } else {
            //Si existe alguna fila que sea igual a $consultaRecursos, entonces mostramos el siguiente mensaje
            $mensaje = "";
            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle

            foreach ($dataCollected as $ong) {
                $color = "cuadro -celeste";
                
                $clase_cuadro = "cuadro -celeste";
                $clase_cuadro_out = "cuadro -out-celeste";
                $clase_subcuadro = "cuadro -celeste" . " claro";
                $mensaje = "<div class='$color' style='font-size:1.2rem;border-radius:0rem;width:100%;text-align:center'> $ong[nombre] </div>";
                $mensaje .= "
                <div class='container'>
                    <div class='row'>
                        <div class='col' style='padding:0.4rem'>
                                <div class='btn btn-secondary' style='color:#fff;width:100%;height:100%'>
                                   <a href='planificar/' style='color:#fff;width:100%;display:inline-block'>Planificar</a>
                                </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col' style='padding:0.4rem'>
                                <div class='grupo-vertical' style='width:100%;height:100%'>
                                    <div class='$clase_cuadro' style='width:100%'>
                                        <strong> País </strong>
                                    </div>
                                    <div class='$clase_subcuadro' style='height:100%'>
                                        $ong[pais]
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col' style='padding:0.4rem'>
                            <div class='grupo-vertical' style='width:100%;height:100%'>
                                <div class='$clase_cuadro' style='width:100%'>
                                    <strong> Descripción </strong> 
                                </div>    
                                <div class='$clase_subcuadro' style='height:100%'>
                                    $ong[descripcion]
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class='row'>
                        <div class='col grupo' style='padding:0.4rem;padding-bottom:0rem'>
                            <div class='$clase_cuadro' id='boton_recursos' onClick='mostrar_recursos()' style='font-size:1.2rem;border-bottom-left-radius:0'>
                                Recursos
                            </div>
                            <div class='$clase_cuadro_out' id='boton_movilizaciones' onClick='mostrar_movilizaciones()' style='font-size:1.2rem;border-bottom-right-radius:0'>
                                Movilizaciones
                            </div>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col' style='padding:0rem 0.4rem'>
                            <div class='cuadro' style='border-radius:0rem;width:100%;background-color:var(--info)'>
                                <div id='tipos_recursos' class='grupo' style='float:right'><span class='cuadro -verde'> <span class='full-text'>aprobado</span> <span class='short-text fa fa-check'></span></span><span class='cuadro -celeste'> <span class='full-text'>en trámite</span> <span class='short-text fa fa-clock'></span> </span><span class='cuadro -rojo'> <span class='full-text'>rechazado</span> <span class='short-text fa fa-times'></span> </span></div>
                                <div id='tipos_movilizaciones' class='grupo' style='display:none;float:right'><span class='cuadro -verde'> <span class='full-text'>marcha</span> <span class='short-text fa fa-bullhorn'></span></span><span class='cuadro -azul'> <span class='full-text'>en redes sociales</span> <span class='short-text fa fa-globe'></span> </span></div>    
                            </div>
                        </div>
                    </div>



                
                ";

                echo $mensaje;

                include('../navegacion/ong_recursos.php');
                include('../navegacion/ong_movilizaciones.php');


                echo "
                </div>
                "
                
                ;

            };

        }; //Fin else $filas

        //};
    };//Fin isset $consultaRecursos

    //Devolvemos el mensaje que tomará jQuery









    } else if ($_SESSION["status"] == "socio") {
        echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola $_SESSION[nombre] $_SESSION[apellido]! Te damos la bienvenida.
            </div>";
    };


        










} else {
    echo "<div class='cuadro -azul' style='width:100%'>
    ¡Hola! Para ver su cuenta, puede iniciar sesión
    como ONG o Socio en la barra superior!
    </div>";
};






?>





<?php include('../templates/footer_navegacion.html');   ?>
