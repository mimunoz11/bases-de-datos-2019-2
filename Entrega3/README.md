# Entrega 3 (Grupo 06 & 23)
codd.ing.puc.cl/~grupo6/

## Credenciales
Todas las credenciales tienen el formato:

* Socio: [Primeras 2 letras del nombre] + [primeras 2 letras del apellido] + '1234'
  
* Ong: [Primeras 2 letras del nombre] + [Primeras 2 letras del nombre] + '1234'

Algunas credenciales son:

SOCIO

* nombre: 'Angelica Rocio'
* apellido: 'Falcone'
* clave: 'anfa1234'

ONG
* nombre: 'Abbott ' *lleva un espacio al final*
* clave: 'abab1234'


## Sobre el inicio de sesión

Para iniciar sesión, es posible utilizar la barra de navegador que queda en la parte superior derecha de la página, distinguiendo entre ONG y Socio.

### ONG

1. Para esto, se pide el nombre y su contraseña (que se especifica más arriba).

2. Sobre las **movilizaciones y recursos** de una ONG:
  Para cuando una ONG inicia sesión, se debe dirigir a My Profile para poder ver
  las movilizaciones y recursos que tiene. En ambos casos, se despliega opciones de planificación
  país y descripción. Debajo de esto, se señala la opción de escoger entre Recursos o movilizaciones
  (en cuyo caso seleccionado se verá de un celeste oscuro, mientras que el otro será blanco).
  Además, debajo de esta opción también se encuentra la diferencia entre:
     * Si están aprobados (verde), en trámite (transparente) o rechazado (rojo) para Recursos.
     * Si corresponde a una marcha (verde) o en redes sociales (azul) para Movilización. 
  
    Las consultas e informaciones respectiva a cada una se pueden preguntar al hacer click sobre el id o
  sobre el nombre.

3. Para **planificar**: Se puede presionar en el botón que está en My Profile, o ir directo con el botón que está en la barra de navegación.
   
   Una vez dentro, se pedirá comuna (se despliegan las comunas a elegir, lista que se obtuvo originalmente desde la base de datos, y se verificó que el total de estas corresponde al total de comunás de Chile), y un presupuesto (mayor o igual a cero). Adicionalmente, existe un botón *Ver proyectos encontrados* que permite abrir una ventana con los proyectos de la comuna seleccionada que cumplen con las condiciones esstablecidas en el enunciado. Finalmente, está el botón *Planificar* que dirigirá a una página que mostrará las movilizaciones recién creadas y agregadas a la base de datos.

### Socio
1. Para iniciar como socio, se pide nombre, apellido y contraseña (que se especifican arriba).
2. Para **crear un nuevo proyecto**, se puede presionar el botón *Crear Nuevo Proyecto* de la barra de navegación. Una vez ahí, se piden los datos respectivos (asumimos que la fecha de apertura puede ser distinta a la de ingreso del proyecto a la base de datos), y se piden datos extras dependiendo del tipo de proyecto que se pretende crear. Finalmente, se puede dar clic en *Submit*, y se ingresará el proyecto a la base de datos, incluyendo también en la tabla de asociados con la id del Socio actual. Es así como se dirige a una nueva página donde se mostrará el proyecto recién creado.
3. Para **asociarse a un proyecto ya creado**, se puede hacer desde la búsqueda o navegación. Al obtener los datos del proyecto seleccionado, se despliega un botón *Asociarse*, que se mostrará solo en caso de que como usuario ya se haya iniciado sesión, y este proyecto no esté asociado al socio.


## Sobre la Navegación

A esta se puede acceder a través de la página de inicio, donde se muestran las opciones *Proyectos* y *ONGs*.

### Proyectos
1. Una vez dentro, se muestra un cuadro superior con diferentes "botones". 
   * La primera fila corresponde a las opciones *Minas*, *Eléctricas* y *Vertederos*, que permiten filtrar los resultados al presionarlos. 
   * La segunda fila corresponde a *Todos*, y básicamente "presiona" todos los botones de los diferentes tipos, permitiendo mostrar todos, o ninguno en el filtro.
   * La tercera fila corresponde a *Desplegar*, y permite cambiar de opción entre:
     * Si está activado, muestra la información en el mismo sitio, abriendo un espacio luego de la fila respectiva.
     * Si está desactivado, redirige a una nueva página con la información del proyecto.
2. Para mostrar los datos del proyecto, se debe presionar en la fila respectiva, y se cargarán los datos básicos al principio, para luego mostrar datos adicional y también sus recursos (al presionar en estos, se dirige a una nueva página del sitio del recurso, con la información respectiva).

### ONGs
1. Una vez dentro del sitio:
   * Se muestra una barra superior con diferentes letras, las que al presionar, llevará al espacio de los proyectos que tienen como inicial la letra presionada (estas dirigen al espacio, sin embargo, la barra superior también es contada, por lo que es probable que se tenga que subir en la página para ver las primeras ONGs con la letra seleccionada).
   * Bajo las letras, se muestra el botón *Desplegar* que permite, al igual que en *Proyectos*, desplegar la ONG o dirigir a la página de esta.
2. Tras presionar en una fila, se mostrará su información principal, además de sus recursos (los que pueden ser dirigidos a su página al ser presionados), y sus movilizaciones (mostrando su id, presupuesto y a qué proyecto corresponde).

### Recursos
1. A esta página no se inicia desde el inicio, pero se pueden encontrar al presionar en un recurso de proyecto/ONG (las filas corresponden a id y causa).
2. Una vez presionada la fila respectiva, se muestra su información, el proyecto al que está asociado (se puede presionar para dirigir a la página), y las ONGs respectivas (también se pueden presionar).


## Sobre la búsqueda
1. La barra de búsqueda se encuentra en el inicio, y existe una para cada entidad (ONG, proyecto y recurso). Una vez escrito algo en la barra de búsqueda y presionado el botón respectivo, se dirige a los resultados que funcionan de manera muy similar a la página de navegación, pero incluyendo la barra de búsqueda nuevamente en caso de querer cambiar la solicitud para encontrar lo buscado.
2. Al igual que en navegación, estos resultados se da la opción de desplegar para proyectos y ONGs, y dirigir a una nueva página para los recursos, además de los anteriormente mencionados.

## Sobre las Consultas
Se incluyen al final de Inicio, las Consultas de grupos pares e impares de la entrega anterior.

## Sobre la Planificación 
Como se menciona más arriba, para planificar se puede ingresar tras iniciar sesión como ONG, a través de la barra superior o desde My profile.

Esta se realiza a través de *Procedimiento Almacenado*, en la función *planificar(presupuesto, comuna, nombre_ong)* de grupo23 (la función se realizó desde la perspectiva de esta base de datos). Esta está guardada en el archivo *planificar.sql* de grupo6 en la carpeta *Entrega3* (también disponible en grupo23 para poder ser testeado ahí en caso de ser necesario). Adicionalmente, está disponible el archivo *planificar_test.sql* que utiliza tablas de prueba.


¡Gracias!
Salu2.

Manu Muñoz, Cote Garrido, Joaco Terreros, Raúl DC.
