<?php include('../templates/header_navegacion.php');   ?>
<!-- https://stackoverflow.com/questions/386281/how-to-implement-select-all-check-box-in-html -->
<script src=
    "../js/jquery.min.js">
</script>
<script>
    function mostrar_recursos(nombre) {
        var color = "#17a2b8";
        tabla_recursos = document.getElementById("tabla_recursos_" + nombre);
        tabla_movilizaciones = document.getElementById("tabla_movilizaciones_" + nombre);
        cuadro_tipos_recursos = document.getElementById("tipos_recursos_" + nombre);
        cuadro_tipos_movilizaciones = document.getElementById("tipos_movilizaciones_" + nombre);
        tabla_recursos.style.display = "table";
        tabla_movilizaciones.style.display = "none";
        boton_recursos = document.getElementById("boton_recursos_" + nombre);
        boton_movilizaciones = document.getElementById("boton_movilizaciones_" + nombre);
        boton_recursos.style.color = "#fff";
        boton_recursos.style.backgroundColor = color;
        boton_movilizaciones.style.color = color;
        boton_movilizaciones.style.backgroundColor = "#fff";
        cuadro_tipos_recursos.style.display = "inline-flex";
        cuadro_tipos_movilizaciones.style.display = "none";
    };
    function mostrar_movilizaciones(nombre) {
        var color = "#17a2b8";
        tabla_recursos = document.getElementById("tabla_recursos_" + nombre);
        cuadro_tipos_recursos = document.getElementById("tipos_recursos_" + nombre);
        tabla_movilizaciones = document.getElementById("tabla_movilizaciones_" + nombre);
        cuadro_tipos_movilizaciones = document.getElementById("tipos_movilizaciones_" + nombre);
        tabla_recursos.style.display = "none";
        tabla_movilizaciones.style.display = "table";
        boton_recursos = document.getElementById("boton_recursos_" + nombre);
        boton_movilizaciones = document.getElementById("boton_movilizaciones_" + nombre);
        boton_recursos.style.color = color;
        boton_recursos.style.backgroundColor = "#fff";
        boton_movilizaciones.style.color = "#fff";
        boton_movilizaciones.style.backgroundColor = color;
        cuadro_tipos_recursos.style.display = "none";
        cuadro_tipos_movilizaciones.style.display = "inline-flex";
    };
</script>
<?php $tipos = array(1, 2, 3); ?>
<script language="JavaScript">

  var colores = {
    "1": "cuadro -azul",
    "2": "cuadro -verde",
    "3": "cuadro -rojo",
    "4": "cuadro -secundarioo"
  };

  var colores_out = {
    "1": "cuadro -out-azul",
    "2": "cuadro -out-verde",
    "3": "cuadro -out-rojo",
    "4": "cuadro -out-secundarioo"
  };

  var _colores = {
    "1": "var(--blue)",
    "2": "var(--green)",
    "3": "var(--red)",
    "4": "var(--secondary)"
  };


  function mostrar(numero_) {
    //https://stackoverflow.com/questions/1144123/how-can-i-hide-an-html-table-row-tr-so-that-it-takes-up-no-space
    var numero = numero_.slice(1, numero_.length - 2);
    elemento = document.getElementById("ong_" + numero_);
    if (document.getElementById("check_desplegar").checked) {
      if (elemento.style.display == "none") {
        elemento.style.display = "table-row";
      } else {
        elemento.style.display = "none";
        };
      var espacio_recursos = $("[id='espacio_recursos_" + numero_ + "']");
      var espacio_movilizaciones = $("[id='espacio_movilizaciones_" + numero_ + "']");
      if (1 == 1) {
        $.post("ong_recursos.php?id=(" + numero_ + ")", {}, function(mensaje) {
          espacio_recursos.html(mensaje);
        });
        $.post("ong_movilizaciones.php?id=(" + numero_ + ")", {}, function(mensaje) {
          espacio_movilizaciones.html(mensaje);
        });
      };
    } else {
      document.getElementById("enlace_" + numero_).click();
    };
  };

  function mostrar_descripcion(numero) {
    //https://stackoverflow.com/questions/1144123/how-can-i-hide-an-html-table-row-tr-so-that-it-takes-up-no-space

    elemento = document.getElementById("recurso_" + numero);
    if (elemento.style.display == "none") {
      elemento.style.display = "table-row";
    } else {
      elemento.style.display = "none";
      };
  };



  function chequear(jQuery) {
    if (!document.getElementById("check_desplegar").checked) {
      document.getElementById("desplegar_off").style.display = "inline-block";
      document.getElementById("desplegar_on").style.display = "none";
    };
  };
  $(document).ready(chequear);


</script>

<script>
  function buscar() {
    var array = [];
    $("input:checkbox[name=tipo]:checked").each(function() {
        array.push($(this).val());
    });

    $tipos = array;

    if ($tipos != "") {
          $.post("proyectos_filtrar.php", {valorBusqueda: $tipos}, function(mensaje) {
              $("#resultadoBusqueda tbody").html(mensaje);
          });
      } else {
          $("#resultadoBusqueda tbody").html('');
        };
  };

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


  function opcion_desplegar(source) {
    if (source.checked) {
      document.getElementById("desplegar_on").style.display = "inline-block";
      document.getElementById("desplegar_off").style.display = "none";
    } else {
      document.getElementById("desplegar_off").style.display = "inline-block";
      document.getElementById("desplegar_on").style.display = "none";
    };
  };


</script>
    <h6 class="text-center text-secondary mb-0">
      <div class="grupo-vertical" style="min-width:14rem">
        <div style="display:inline;text-align:center;background-color:var(--blue)">
        <?php
        foreach (str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ") as $letra_) {
          echo "<a href='#letra_$letra_' class='cuadro -azul' style='margin:0rem;border-radius:0rem'> $letra_ </a>";
        };



        ?>
        </div>
        <label class="grupo" style="font-size:0.8rem" id="label_desplegar"><input type="checkbox" onClick="opcion_desplegar(this)" id="check_desplegar" style="position:absolute;opacity:0" checked />
          <div class="cuadro -out-celeste" style="border-bottom-left-radius:0.25rem;max-width:3rem;vertical-align:middle"><span class="fa fa-toggle-off" style="font-size:1.4rem;display:none" id="desplegar_off"> </span><span class="fa fa-toggle-on" style="font-size:1.4rem" id="desplegar_on"></span></div><span class="cuadro -celeste" style="font-size:0.8rem" id="cuadro_desplegar"> Desplegar </span>
        </label>
        </div>
      <button class="btn btn-secondary" id="buscar" onClick="buscar();" style="visibility:hidden;"> Buscar </button>
    </h6>
  <!--https://stackoverflow.com/questions/32774708/how-to-avoid-notice-undefined-index-in-php-and-set-default-value-->
  <p><?php
  $tipo = ""; //initialize variable
  if(isset($_POST["tipo"]))
  {
      $tipo = $_POST["tipo"];
  }
  else
  {
      // if nothing selected set default to Blue
      $tipo = 'Hola';
  }; ?> </p>


</body>
    <table class="table" id="resultadoBusqueda" style="margin:1rem">
      <thead class="thead-primary">
        <tr>
          <th style="max-width:2rem"></th>
          <th>Nombre</th>
          <th style="display:none"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        //https://www.neoguias.com/eliminar-acentos-con-php/
        function formato_letra($cadena){

          //Codificamos la cadena en formato utf8 en caso de que nos de errores
          $cadena = utf8_encode($cadena);

          //Ahora reemplazamos las letras
          $cadena = str_replace(
              array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', 'Ã'),
              array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'A'),
              $cadena
          );

          $cadena = str_replace(
              array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
              array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
              $cadena );

          $cadena = str_replace(
              array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
              array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
              $cadena );

          $cadena = str_replace(
              array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
              array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
              $cadena );

          $cadena = str_replace(
              array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
              array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
              $cadena );

          $cadena = str_replace(
              array('ñ', 'Ñ', 'ç', 'Ç'),
              array('n', 'N', 'c', 'C'),
              $cadena
          );

            return $cadena;
        };
        require("../config/conexion.php");
        $nombre_ong = $_GET['busqueda'];
        $query = "SELECT nombre, pais, descripcion FROM ong WHERE nombre LIKE '%$nombre_ong%';";
        $result = $db -> prepare($query);
        $result -> execute();
        $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

        $color = "cuadro -celeste";

        $clase_cuadro = "cuadro -celeste";
        $clase_cuadro_out = "cuadro -out-celeste";
        $clase_subcuadro = "cuadro -celeste" . " claro";
        $numero_ = 0;
        $letra = "1234";
        $color_fondo = "var(--green)";


        //Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
        if ($dataCollected === 0) {
          $mensaje = "<p>No hay proyectos que mostrar</p>";
        } else {
          //Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje

          //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
              foreach ($dataCollected as $p) {
                  $formato_nombre = str_replace(" ", "%20", str_replace("'", "&quot", $p[0]));
                  $formato_nombre_enlace = str_replace(" ", "%20", str_replace("'", "'", $p[0]));

                  $nombre = $p[0];
                  $funcion_mostrar = "mostrar('$formato_nombre')";
                  // https://stackoverflow.com/questions/9720665/how-to-convert-special-characters-to-normal-characters

                  if ($letra != strtoupper(formato_letra($nombre[0]))) {
                    if ($color_fondo == "var(--blue)") {
                      $color_fondo = "var(--green)";
                    } else if ($color_fondo == "var(--green)") {
                      $color_fondo = "var(--blue)";
                    };
                    $letra = strtoupper(formato_letra($nombre[0]));
                    $columna = "<td id='letra_$letra' style='width:3rem;text-align:center;background-color:$color_fondo;color:#fff'><a href='#page-top' style='color:#fff'>$nombre[0]</a></td>";

                  } else {
                    $columna = "<td style='width:3rem;border:none;background-color:$color_fondo;color:#fff'><a href='#page-top'> <span style='visibility:hidden'>$letra</span></a></td>";
                  };

                  //$mensaje .= "<tr> <td class='$color' style='width:4rem'>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
                  $mensaje .= "<tr > $columna <td value='$formato_nombre' onClick=$funcion_mostrar style='color:$color_fondo'>$p[0]</td> <td style='display:none'><a id='enlace_$formato_nombre' href=ong.php?id=($formato_nombre_enlace)></a></td></tr>";

                  $mensaje .= "<tr style='display:none' id='ong_$formato_nombre' name='$formato_nombre'><td colspan='2'><div>
                  <div class='container'>
                    <div class='row'>
                        <div class='col' style='padding:0.4rem'>
                                <div class='grupo-vertical' style='width:100%;height:100%'>
                                    <div class='$clase_cuadro' style='width:100%'>
                                        <strong> País </strong>
                                    </div>
                                    <div class='$clase_subcuadro' style='height:100%'>
                                        $p[pais]
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
                                    $p[descripcion]
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class='row'>
                        <div class='col grupo' style='padding:0.4rem;padding-bottom:0rem'>
                            <div value='false' class='$clase_cuadro' id='boton_recursos_$formato_nombre' onClick=mostrar_recursos('$formato_nombre') style='font-size:1.2rem;border-bottom-left-radius:0'>
                                Recursos
                            </div>
                            <div value='false' class='$clase_cuadro_out' id='boton_movilizaciones_$formato_nombre' onClick=mostrar_movilizaciones('$formato_nombre') style='font-size:1.2rem;border-bottom-right-radius:0'>
                                Movilizaciones
                            </div>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col' style='padding:0rem 0.4rem'>
                            <div class='cuadro' style='border-radius:0rem;width:100%;background-color:var(--info)'>
                                <div  id='tipos_recursos_$formato_nombre' class='grupo' style='float:right'><span class='cuadro -verde'> <span class='full-text'>aprobado</span> <span class='short-text fa fa-check'></span></span><span class='cuadro -celeste'> <span class='full-text'>en trámite</span> <span class='short-text fa fa-clock'></span> </span><span class='cuadro -rojo'> <span class='full-text'>rechazado</span> <span class='short-text fa fa-times'></span> </span></div>
                                <div  id='tipos_movilizaciones_$formato_nombre' class='grupo' style='display:none;float:right'><span class='cuadro -verde'> <span class='full-text'>marcha</span> <span class='short-text fa fa-bullhorn'></span></span><span class='cuadro -azul'> <span class='full-text'>en redes sociales</span> <span class='short-text fa fa-globe'></span> </span></div>
                            </div>
                        </div>
                    </div>

                 <div id='espacio_recursos_$formato_nombre'></div>
                 <div id='espacio_movilizaciones_$formato_nombre'></div>
                 </div> </tr>

                ";
                };

        }; //Fin else $filas


      //Devolvemos el mensaje que tomará jQuery
      echo $mensaje;
      ?>

      </tbody>
    </table>
<?php include('../templates/footer_navegacion.html');   ?>
