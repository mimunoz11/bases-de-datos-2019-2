<?php session_start();?>
<?php include('../../templates/header_me.php');   ?>
<?php 

if (isset($_SESSION["status"])) {
    if ($_SESSION["status"] == "ong") {
        
               
        echo " 
        <script>
        function verProyectos() { 
            var selecto = document.getElementById('inlineFormCustomSelect');
            var comuna = selecto.value;
            VentanaCentrada('comuna_proyectos.php?comuna=' + comuna,'400','400','Popupuno');return false;;
          }; 

          //<![CDATA[
            var win= null;
            function VentanaCentrada(pagina,w,h,nombre){
            var winleft = (screen.width-w)/2;
            var wintop = (screen.height-h)/2;
            caracteristicas='height='+h+',width='+w+',top='+wintop+',left='+winleft+',scrollbars=no,toolbar=no,resizable=yes'
            win=window.open(pagina,nombre,caracteristicas)
            if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
            }
            //]]>
        
        </script>
        ";
        echo "<div class='cuadro -azul' style='width:100%;text-align:center'>
            Planificación
            </div>";
            
        echo "
        <!--form class='form-inline' action='resultados.php' method='POST'-->
        <div class='row justify-content-md-center'>
        <!-- Portfolio Item 1 -->
        <div class='col-sm-6 py-2'>
          <div class='card card-body h-200 text-white bg-primary d-flex justify-content-center'  style='padding:1rem 2rem'>
            <form action='resultados.php' method='POST'>
                <div class='form-group row'>
        <label class='mr-sm-2' for='inlineFormCustomSelect'>Comuna </label>
        <select required class='custom-select mb-2 mr-sm-2 mb-sm-0' id='inlineFormCustomSelect' name='comuna'>
          <option disabled selected value=''>Elegir...</option>

          ";
        $lista_comunas = explode(",", "Aisén,Algarrobo,Alhué,Alto Biobío,Alto del Carmen,Alto Hospicio,Ancud,Andacollo,Angol,Antártica,Antofagasta,Antuco,Arauco,Arica,Buin,Bulnes,Cabildo,Cabo de Hornos,Cabrero,Calama,Calbuco,Caldera,Calera,Calera de Tango,Calle Larga,Camarones,Camiña,Canela,Cañete,Carahue,Cartagena,Casablanca,Castro,Catemu,Cauquenes,Cerrillos,Cerro Navia,Chaitén,Chañaral,Chanco,Chépica,Chiguayante,Chile Chico,Chillán,Chillán Viejo,Chimbarongo,Cholchol,Chonchi,Cisnes,Cobquecura,Cochamó,Cochrane,Codegua,Coelemu,Coihaique,Coihueco,Coinco,Colbún,Colchane,Colina,Collipulli,Coltauco,Combarbalá,Concepción,Conchalí,Concón,Constitución,Contulmo,Copiapó,Coquimbo,Coronel,Corral,Cunco,Curacautín,Curacaví,Curaco de Vélez,Curanilahue,Curarrehue,Curepto,Curicó,Dalcahue,Diego de Almagro,Doñihue,El Bosque,El Carmen,El Monte,El Quisco,El Tabo,Empedrado,Ercilla,Estación Central,Florida,Freire,Freirina,Fresia,Frutillar,Futaleufú,Futrono,Galvarino,General Lagos,Gorbea,Graneros,Guaitecas,Hijuelas,Hualaihué,Hualañé,Hualpén,Hualqui,Huara,Huasco,Huechuraba,Illapel,Independencia,Iquique,Isla de Maipo,Isla de Pascua,Juan Fernández,La Cisterna,La Cruz,La Estrella,La Florida,Lago Ranco,Lago Verde,La Granja,Laguna Blanca,La Higuera,Laja,La Ligua,Lampa,Lanco,La Pintana,La Reina,Las Cabras,Las Condes,La Serena,La Unión,Lautaro,Lebu,Licantén,Limache,Linares,Litueche,Llaillay,Llanquihue,Lo Barnechea,Lo Espejo,Lolol,Loncoche,Longaví,Lonquimay,Lo Prado,Los Álamos,Los Andes,Los Ángeles,Los Lagos,Los Muermos,Los Sauces,Los Vilos,Lota,Lumaco,Machalí,Macul,Máfil,Maipú,Malloa,Marchihue,María Elena,María Pinto,Mariquina,Maule,Maullín,Mejillones,Melipeuco,Melipilla,Molina,Monte Patria,Mostazal,Mulchén,Nacimiento,Nancagua,Natales,Navidad,Negrete,Ninhue,Ñiquén,Nogales,Nueva Imperial,Ñuñoa,O'Higgins,Olivar,Ollagüe,Olmué,Osorno,Ovalle,Padre Hurtado,Padre Las Casas,Paiguano,Paillaco,Paine,Palena,Palmilla,Panguipulli,Panquehue,Papudo,Paredones,Parral,Pedro Aguirre Cerda,Pelarco,Pelluhue,Pemuco,Peñaflor,Peñalolén,Pencahue,Penco,Peralillo,Perquenco,Petorca,Peumo,Pica,Pichidegua,Pichilemu,Pinto,Pirque,Pitrufquén,Placilla,Portezuelo,Porvenir,Pozo Almonte,Primavera,Providencia,Puchuncaví,Pucón,Pudahuel,Puente Alto,Puerto Montt,Puerto Octay,Puerto Varas,Pumanque,Punitaqui,Punta Arenas,Puqueldón,Purén,Purranque,Putaendo,Putre,Puyehue,Queilén,Quellón,Quemchi,Quilaco,Quilicura,Quilleco,Quillón,Quillota,Quilpué,Quinchao,Quinta de Tilcoco,Quinta Normal,Quintero,Quirihue,Rancagua,Ránquil,Rauco,Recoleta,Renaico,Renca,Rengo,Requínoa,Retiro,Rinconada,Río Bueno,Río Claro,Río Hurtado,Río Ibáñez,Río Negro,Río Verde,Romeral,Saavedra,Sagrada Familia,Salamanca,San Antonio,San Bernardo,San Carlos,San Clemente,San Esteban,San Fabián,San Felipe,San Fernando,San Gregorio,San Ignacio,San Javier,San Joaquín,San José de Maipo,San Juan de la Costa,San Miguel,San Nicolás,San Pablo,San Pedro,San Pedro de Atacama,San Pedro de la Paz,San Rafael,San Ramón,San Rosendo,Santa Bárbara,Santa Cruz,Santa Juana,Santa María,Santiago,Santo Domingo,San Vicente,Sierra Gorda,Talagante,Talca,Talcahuano,Taltal,Temuco,Teno,Teodoro Schmidt,Tierra Amarilla,Tiltil,Timaukel,Tirúa,Tocopilla,Toltén,Tomé,Torres del Paine,Tortel,Traiguén,Treguaco,Tucapel,Valdivia,Vallenar,Valparaíso,Vichuquén,Victoria,Vicuña,Vilcún,Villa Alegre,Villa Alemana,Villarrica,Viña del Mar,Vitacura,Yerbas Buenas,Yumbel,Yungay,Zapallar");
        foreach ($lista_comunas as $comuna) {
          echo "<option value='$comuna'>$comuna</option>";
        };
        echo "</select>
        </div>
        <div class='form-group row'>
        <label  class='mr-sm-2' for='casillaPresupuesto'> Presupuesto </label>
        <input required class='form-control mb-2 mr-sm-2 mb-sm-0' type='number' name='presupuesto' min='0' id='casillaPresupuesto' step='1'>
        </div>
        <div class='form-group row' style='width:100%;text-align:center'>
        <label style='width:100%;text-align:center;left:auto;right:auto'>
        <label  style='text-align:left;float:left;'>

        <div class='btn btn-primary' onClick='verProyectos()' style='font-size:0.8rem;width:10rem' id='proyectos' value='proyectos'>Ver proyectos encontrados</div>
        </label>
        <label  style='text-align:right;float:right;'>
        <input class='btn btn-secondary' id='submit' type='submit' value='Planificar'>
        </label></label></form></div></div></div>";


        echo "<div id='tabla'></div>";
    //        <input class='form-control col-sm-9 py-2' id='search' name='busqueda' type='text' placeholder='Busca ONGs por Nombre'>


    } else {
        echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola! Para poder planificar movilizaciones, ¡puedes iniciar sesión como ONG!
            </div>";
    };
} else {
    echo "<div class='cuadro -azul' style='width:100%'>
            ¡Hola! Para poder planificar movilizaciones, ¡puedes iniciar sesión como ONG!
            </div>";
};