<?php include('../templates/header_navegacion.php');   ?>
<!-- https://stackoverflow.com/questions/386281/how-to-implement-select-all-check-box-in-html -->
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
        mostrar_mas(numero, tipo);
        mostrar_recursos(numero);
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
    checkboxes = document.getElementsByName('tipo');
    for(var i=0, n=checkboxes.length;i<n;i++) {
      caja = checkboxes[i];
      numero = caja.value;
      boton = document.getElementById("label_" + checkboxes[i].value);
      if (checkboxes[i].checked) { //&& boton.style.opacity != 1) {
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
    if (check_todo.checked) { //&& check_todo.style.opacity != 1) {
      //mensaje_todo.textContent = "Desmarcar todo";
      //boton_marcar_todo.setAttribute("class", colores["4"]);
      //boton_marcar_todo.style.opacity = 1;
      boton_marcar_todo.style.color = "#fff";
      boton_marcar_todo.style.backgroundColor = _colores["4"];
    } else { //if (!(check_todo.checked)) { //&& check_todo.style.opacity != 0.6) {
      //mensaje_todo.textContent = "Marcar todo";
      //boton_marcar_todo.setAttribute("class", colores_out["4"]);
      //boton_marcar_todo.style.opacity = 0.6;
      boton_marcar_todo.style.color = _colores["4"];
      boton_marcar_todo.style.backgroundColor = "#fff";
    };

    if (!document.getElementById("check_desplegar").checked) {
      document.getElementById("desplegar_off").style.display = "inline-block";
      document.getElementById("desplegar_on").style.display = "none";
    };
    $("#buscar").click();
  };

  $("input:checkbox[name=tipo]").on("touchstart", function(){
    $(this).removeClass("mobileHoverFix");
  });
  $("input:checkbox[name=tipo]").on("touchend", function(){
      $(this).addClass("mobileHoverFix");
  });

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
          $.post("busqueda_proyectos_filtrar.php", {valorBusqueda: $tipos, busqueda: "<?php echo $_GET["busqueda"] ?>"}, function(mensaje) {
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
        </label>
        <label class="grupo" style="font-size:0.8rem" id="label_desplegar"><input type="checkbox" onClick="opcion_desplegar(this)" id="check_desplegar" style="position:absolute;opacity:0" checked />
          <div class="cuadro -out-celeste" style="max-width:3rem;vertical-align:middle"><span class="fa fa-toggle-off" style="font-size:1.4rem;display:none" id="desplegar_off"> </span><span class="fa fa-toggle-on" style="font-size:1.4rem" id="desplegar_on"></span></div><span class="cuadro -celeste" style="font-size:0.8rem" id="cuadro_desplegar"> Desplegar </span>
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
                  $.post("proyectos_filtrar.php", {valorBusqueda: $tipos}, function(mensaje) {
                      $("#resultadoBusqueda tbody").html(mensaje);
                  });
              } else {
                  $("#resultadoBusqueda tbody").html('');
            };
        });
    </script-->

</body>
<!--
<body>
  <--?php
    # https://stackoverflow.com/questions/8270134/checking-value-in-an-array-inside-one-sql-query-with-where-clause
    $tipos_string = implode(',', $tipos);
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    #$var = $_POST["tipo"];
    $query = "SELECT Proyectos.pid AS id, tipo, nombre, latitud, longitud, comuna, fecha_apertura, operativo FROM Proyectos WHERE tipo IN ($tipos_string)";
    echo $query;
    $result = $db_2 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
    ?>
-->
    <table class="table" id="resultadoBusqueda">
      <thead class="thead-primary">
        <tr>
          <th style="width:4.2rem">ID</th>
          <th>Nombre</th>
          <th style="display:none"></th>
        </tr>
      </thead>
      <tbody>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>
        <tr style="width:4.2rem;border:none"><td style="border:none"></td><td style="border:none"></td></tr>




      <!--
        <--?php
        foreach ($dataCollected as $p) {
          echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td> </tr>";
        }
        ?>
      -->
      </tbody>
    </table>
<?php include('../templates/footer_navegacion.html');   ?>
