<?php include('../templates/header_navegacion.php');   ?>

<!-- CREAR NUEVO PROYECTO -->
    <!-- Portfolio Section -->


  <section class="page-section portfolio" id="nuevo_proyecto">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Crear Nuevo Proyecto</h2>

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
          <div class="card card-body h-200 text-white bg-primary d-flex justify-content-center">
            <form action="../login/consultas_login/creacion_proyecto.php" method="GET">
                <div class="form-group">
                    <label for="example-text-input">Nombre Proyecto</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="nombre_proyecto" name="nombre_proyecto" placeholder="Nombre Proyecto" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for='inlineFormCustomSelect'>Comuna </label>
                  <div class="col-10">
                  <select required class='custom-select mb-2 mr-sm-2 mb-sm-0' id='inlineFormCustomSelect' name='comuna'>
                  <option disabled selected value=''>Elegir...</option>
                  <?php
                          $lista_comunas = explode(",", "Aisén,Algarrobo,Alhué,Alto Biobío,Alto del Carmen,Alto Hospicio,Ancud,Andacollo,Angol,Antártica,Antofagasta,Antuco,Arauco,Arica,Buin,Bulnes,Cabildo,Cabo de Hornos,Cabrero,Calama,Calbuco,Caldera,Calera,Calera de Tango,Calle Larga,Camarones,Camiña,Canela,Cañete,Carahue,Cartagena,Casablanca,Castro,Catemu,Cauquenes,Cerrillos,Cerro Navia,Chaitén,Chañaral,Chanco,Chépica,Chiguayante,Chile Chico,Chillán,Chillán Viejo,Chimbarongo,Cholchol,Chonchi,Cisnes,Cobquecura,Cochamó,Cochrane,Codegua,Coelemu,Coihaique,Coihueco,Coinco,Colbún,Colchane,Colina,Collipulli,Coltauco,Combarbalá,Concepción,Conchalí,Concón,Constitución,Contulmo,Copiapó,Coquimbo,Coronel,Corral,Cunco,Curacautín,Curacaví,Curaco de Vélez,Curanilahue,Curarrehue,Curepto,Curicó,Dalcahue,Diego de Almagro,Doñihue,El Bosque,El Carmen,El Monte,El Quisco,El Tabo,Empedrado,Ercilla,Estación Central,Florida,Freire,Freirina,Fresia,Frutillar,Futaleufú,Futrono,Galvarino,General Lagos,Gorbea,Graneros,Guaitecas,Hijuelas,Hualaihué,Hualañé,Hualpén,Hualqui,Huara,Huasco,Huechuraba,Illapel,Independencia,Iquique,Isla de Maipo,Isla de Pascua,Juan Fernández,La Cisterna,La Cruz,La Estrella,La Florida,Lago Ranco,Lago Verde,La Granja,Laguna Blanca,La Higuera,Laja,La Ligua,Lampa,Lanco,La Pintana,La Reina,Las Cabras,Las Condes,La Serena,La Unión,Lautaro,Lebu,Licantén,Limache,Linares,Litueche,Llaillay,Llanquihue,Lo Barnechea,Lo Espejo,Lolol,Loncoche,Longaví,Lonquimay,Lo Prado,Los Álamos,Los Andes,Los Ángeles,Los Lagos,Los Muermos,Los Sauces,Los Vilos,Lota,Lumaco,Machalí,Macul,Máfil,Maipú,Malloa,Marchihue,María Elena,María Pinto,Mariquina,Maule,Maullín,Mejillones,Melipeuco,Melipilla,Molina,Monte Patria,Mostazal,Mulchén,Nacimiento,Nancagua,Natales,Navidad,Negrete,Ninhue,Ñiquén,Nogales,Nueva Imperial,Ñuñoa,O'Higgins,Olivar,Ollagüe,Olmué,Osorno,Ovalle,Padre Hurtado,Padre Las Casas,Paiguano,Paillaco,Paine,Palena,Palmilla,Panguipulli,Panquehue,Papudo,Paredones,Parral,Pedro Aguirre Cerda,Pelarco,Pelluhue,Pemuco,Peñaflor,Peñalolén,Pencahue,Penco,Peralillo,Perquenco,Petorca,Peumo,Pica,Pichidegua,Pichilemu,Pinto,Pirque,Pitrufquén,Placilla,Portezuelo,Porvenir,Pozo Almonte,Primavera,Providencia,Puchuncaví,Pucón,Pudahuel,Puente Alto,Puerto Montt,Puerto Octay,Puerto Varas,Pumanque,Punitaqui,Punta Arenas,Puqueldón,Purén,Purranque,Putaendo,Putre,Puyehue,Queilén,Quellón,Quemchi,Quilaco,Quilicura,Quilleco,Quillón,Quillota,Quilpué,Quinchao,Quinta de Tilcoco,Quinta Normal,Quintero,Quirihue,Rancagua,Ránquil,Rauco,Recoleta,Renaico,Renca,Rengo,Requínoa,Retiro,Rinconada,Río Bueno,Río Claro,Río Hurtado,Río Ibáñez,Río Negro,Río Verde,Romeral,Saavedra,Sagrada Familia,Salamanca,San Antonio,San Bernardo,San Carlos,San Clemente,San Esteban,San Fabián,San Felipe,San Fernando,San Gregorio,San Ignacio,San Javier,San Joaquín,San José de Maipo,San Juan de la Costa,San Miguel,San Nicolás,San Pablo,San Pedro,San Pedro de Atacama,San Pedro de la Paz,San Rafael,San Ramón,San Rosendo,Santa Bárbara,Santa Cruz,Santa Juana,Santa María,Santiago,Santo Domingo,San Vicente,Sierra Gorda,Talagante,Talca,Talcahuano,Taltal,Temuco,Teno,Teodoro Schmidt,Tierra Amarilla,Tiltil,Timaukel,Tirúa,Tocopilla,Toltén,Tomé,Torres del Paine,Tortel,Traiguén,Treguaco,Tucapel,Valdivia,Vallenar,Valparaíso,Vichuquén,Victoria,Vicuña,Vilcún,Villa Alegre,Villa Alemana,Villarrica,Viña del Mar,Vitacura,Yerbas Buenas,Yumbel,Yungay,Zapallar");
                          foreach ($lista_comunas as $comuna) {
                            echo "<option value='$comuna'>$comuna</option>";
                          };

                  ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input">Latitud</label>
                    <div class="col-10">
                        <input class="form-control" type="number" step="any" id="latitud" name="latitud" placeholder="Latitud" min="-100" max="100" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-text-input">Longitud</label>
                    <div class="col-10">
                        <input class="form-control" type="number" step="any" id="longitud" name="longitud" placeholder="Longitud " min="-100" max="100" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-date-input">Fecha</label>
                    <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" id="fecha" name="fecha" required>
                    </div>
                </div>
                <fieldset class="form-group">
                <label for='inlineFormCustomSelect'>Proyecto Operativo </label>
                  <div class="col-10">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="operativo" id="optionsRadios1" value="si" checked>
                      Si
                    </label>
                  </div>
                  <div class="form-check">
                  <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="operativo" id="optionsRadios2" value="no">
                      No
                    </label>
                  </div>
                  </div>
                </fieldset>

                <label for='inlineFormCustomSelect'>Tipo </label>
                <div class="col-10">
                  <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="Check1" value="1"> Mina<br>
                  <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="Check2" value="2"> Eléctrica<br>
                  <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="Check3" value="3" checked> Vertedero<br>
                  <div id="if1" style="display:none">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Mineral </label>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="mineral">
                      <option selected>Choose...</option>
                      <option value="Silicio">Silicio</option>
                      <option value="Pumicita">Pumicita</option>
                      <option value="Diatomitas">Diatomitas</option>
                      <option value="Hidrocarburos">Hidrocarburos</option>
                      <option value="Diamante">Diamante</option>
                      <option value="Cuarzo">Cuarzo</option>
                      <option value="Yeso">Yeso</option>
                      <option value="Carbón">Carbón</option>
                      <option value="Sal">Sal</option>
                      <option value="Cal">Cal</option>
                      <option value="Caliza">Caliza</option>
                      <option value="Yodo">Yodo</option>
                      <option value="Oro">Oro</option>
                      <option value="Cobre">Cobre</option>
                      <option value="Boratos">Boratos</option>
                      <option value="Arenas Silíceas">Arenas Silíceas</option>
                      <option value="Nitratos">Nitratos</option>
                      <option value="Manganeso">Manganeso</option>
                      <option value="Cinc">Cinc</option>
                      <option value="Lapislázuli">Lapislázuli</option>
                      <option value="Hierro">Hierro</option>
                    </select>

                  </div>

                  <div id="if2" style="display:none">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo </label>
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineForm1CustomSelect" name="tipo_electrica">
                      <option selected>Choose...</option>
                      <option value="hidroeléctrica">hidroeléctrica</option>
                      <option value="solar">solar</option>
                      <option value="geotérmica">geotérmica</option>
                      <option value="mareomotriz">mareomotriz</option>
                      <option value="termoeléctrica">termoeléctrica</option>

                    </select>

                  </div>
                </div>
                <div class="col text-center">
                  <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
            </form>
            </div>
        </div>

      </div>
    </div>
  </section>
  <!-- CREAR NUEVO PROYECTO hasta aquí -->


<?php include('../templates/footer_navegacion.html');   ?>

<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('Check1').checked) {
        document.getElementById('if1').style.display = 'block';
    }
    else if (document.getElementById('Check2').checked) {
        document.getElementById('if1').style.display = 'none';
    }
    else if (document.getElementById('Check3').checked) {
        document.getElementById('if1').style.display = 'none';
    }
    if (document.getElementById('Check2').checked) {
        document.getElementById('if2').style.display = 'block';
    }
    else if (document.getElementById('Check3').checked) {
        document.getElementById('if2').style.display = 'none';
    }
    else if (document.getElementById('Check1').checked) {
        document.getElementById('if2').style.display = 'none';
    }
}

</script>
