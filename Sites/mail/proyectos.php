<?php include('../templates/header_mail.php');  
if (!isset($_SESSION['status'])){
  echo "<p style='font-size:1.2rem;text-align:center'>¡Hola! Para ingresar a esta página es necesario iniciar sesión antes.</p>";
} else { ?>
     

<script src=
    "../js/jquery.min.js">
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


  function mostrar(numero) {
    //https://stackoverflow.com/questions/1144123/how-can-i-hide-an-html-table-row-tr-so-that-it-takes-up-no-space

    elemento = document.getElementById("proyecto_" + numero);
    var tipo = $("#proyecto_" + numero).attr("name");
    if (document.getElementById("check_desplegar").checked) {
      if (elemento.style.display == "none") {
        elemento.style.display = "table-row";
  
      } else {
        elemento.style.display = "none";
        };
    } else {
      document.getElementById("enlace_" + numero).click();
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

  function toggle(source) {
    checkboxes = document.getElementsByName('tipo');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
      caja = checkboxes[i];
      numero = caja.value;
      boton = document.getElementById("label_" + numero);
      if (caja.checked) { //&& boton.style.opacity != 1) {
        //boton.setAttribute('class', colores[checkboxes[i].value]);
        //boton.style.opacity = 1;
        boton.style.color = "#fff";
        boton.style.backgroundColor = _colores[numero];
      } else { //if (!(checkboxes[i].checked)) { //&& boton.style.opacity != 0.8) {
        //boton.setAttribute('class', colores_out[checkboxes[i].value]);
        //boton.style.opacity = 0.8;
        boton.style.color = _colores[numero];
        boton.style.backgroundColor = "#fff";

      };
    };
    boton_marcar_todo = document.getElementById("label_4");
    check_todo = document.getElementById("marcar_todo");
    //mensaje_todo = document.getElementById("mensaje_todo");
    if (source.checked) { //&& check_todo.style.opacity != 1) {
      //mensaje_todo.innerHTML = "Desmarcar todo";
      //boton_marcar_todo.setAttribute("class", colores["4"]);
      //boton_marcar_todo.style.opacity = 1;
      boton_marcar_todo.style.color = "#fff";
      boton_marcar_todo.style.backgroundColor = _colores["4"];
    } else { //if (!(source.checked) && check_todo.style.opacity != 0.6) {
      //mensaje_todo.innerHTML = "Marcar todo";
      //boton_marcar_todo.setAttribute("class", colores_out["4"]);
      //boton_marcar_todo.style.opacity = 0.6;
      boton_marcar_todo.style.color = _colores["4"];
      boton_marcar_todo.style.backgroundColor = "#fff";
    };
    buscar()
  };

  function marcar(source) {
    numero = source.value;
    boton = document.getElementById("label_" + numero);
    if (source.checked) {
      //$("#resultadoBusqueda tbody").html("label_" + source.value);
      //boton.setAttribute('class', colores[source.value]);
      //boton.style.opacity = 1;
      boton.style.color = "#fff";
      boton.style.backgroundColor = _colores[numero];
    } else {
      //$("#resultadoBusqueda tbody").html("chaito jiji")
      //boton.setAttribute('class', colores_out[source.value]);
      //boton.style.opacity = 0.8;
      boton.style.color = _colores[numero];
      boton.style.backgroundColor = "#fff";
    };
    buscar()
  };


  function chequear(jQuery) {
    

    if (!document.getElementById("check_desplegar").checked) {
      document.getElementById("desplegar_off").style.display = "inline-block";
      document.getElementById("desplegar_on").style.display = "none";
    } else {
      document.getElementById("desplegar_on").style.display = "inline-block";
      document.getElementById("desplegar_off").style.display = "none";
    };
    //$("#buscar").click();
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
    $todos_tipos = ["1", "2", "3"];

    if ($tipos != "") {
      for(var i=0, n=$todos_tipos.length;i<n;i++) {
        tablas = document.getElementsByName($todos_tipos[i]);
        if ($tipos.includes($todos_tipos[i])) {
          for(var _i=0, _n=tablas.length;_i<_n;_i++) {
            tablas[_i].style.display = "table-row";
          };
        } else {
          for(var _i=0, _n=tablas.length;_i<_n;_i++) {
            tablas[_i].style.display = "none";
          };
        };
      };
    };
  };

  function mostrar_mas(numero, tipo) {
    var lista = [numero, tipo]
    if (numero !== "") {
          $.post("../navegacion/proyecto_adicional.php", {valorAdicional: lista}, function(mensaje) {
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

  function ir_recurso(numero) {
    window.location = "recurso.php?id='" + numero + "'";
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
      <div class="grupo-vertical">
        <div class="grupo" style="margin-bottom:0rem">
        <!--
          <label class="cuadro -azul" id="label_1" style="margin-bottom:0rem"><input type="checkbox" name="tipo" value="1" onClick="marcar(this)" style="position:absolute;opacity:0" onClick="buscar()" checked />
            Minas
          </label>
          <label class="cuadro -verde" id="label_2" style="margin-bottom:0rem"><input type="checkbox" name="tipo" value="2" onClick="marcar(this)" style="position:absolute;opacity:0" checked />
            Eléctricas
          </label>
          <label class="cuadro -rojo" id="label_3" style="margin-bottom:0rem"><input type="checkbox" name="tipo" value="3" onClick="marcar(this)" style="position:absolute;opacity:0" checked/>
            Vertederos
          </label>
          </div>
        <label class="cuadro -secundarioo" style="font-size:0.8rem;margin-bottom:0rem" id="label_4"><input type="checkbox" onClick="toggle(this)" id="marcar_todo" style="position:absolute;opacity:0" checked />
          <span id="mensaje_todo"> Todo</span>
        </label>-->
        <label class="grupo" style="font-size:0.8rem;margin:0" id="label_desplegar"><input type="checkbox" onClick="opcion_desplegar(this)" id="check_desplegar" style="position:absolute;opacity:0" checked />
          <div class="cuadro -out-celeste" style="max-width:3rem;vertical-align:middle"><span class="fa fa-toggle-off" style="font-size:1.4rem;display:none" id="desplegar_off"> </span><span class="fa fa-toggle-on" style="font-size:1.4rem" id="desplegar_on"></span></div><span class="cuadro -celeste" style="font-size:0.8rem" id="cuadro_desplegar"> Desplegar </span>
        </label>
        </div>
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

<!-- https://www.geeksforgeeks.org/how-to-get-all-selected-checkboxes-in-an-array-using-jquery/ -->
<!--p id="filtro">
  </p-->
    <!--script>

        $('button').on('click', function() {
            var array = [];
            $("input:checkbox[name=tipo]:checked").each(function() {
                array.push($(this).val());
            });
            //$('#filtro').text(array);

            $tipos = array;

            if ($tipos != "") {
                  $.post("../navegacion/proyectos_filtrar.php", {valorBusqueda: $tipos}, function(mensaje) {
                      $("#resultadoBusqueda tbody").html(mensaje);
                  });
              } else {
                  $("#resultadoBusqueda tbody").html('');
            };
        });
    </script-->

</body>

<body>

    <p style="font-size:1.2rem;text-align:center"> Proyectos que han enviado mensajes. Para desplegar más información bajo el cuadro del proyecto, es posible presionar en cada uno de los proyectos.
      En caso de querer abrir la página del proyecto con más información, se puede presionar el botón <i>Desplegar</i> de más arriba.
    </p>

    <table class="table" id="resultadoBusqueda">
      <thead class="thead-primary">
        <tr>
          <th style="width:4.2rem">ID</th>
          <th>Nombre</th>
          <th>Correos</th>
          <th style="display:none"></th>
        </tr>
      </thead>
      <tbody>
        <?php include("proyectos_filtrar.php");?>



      </tbody>
    </table>
      <?php }; include('../templates/footer_navegacion.html');   ?>
