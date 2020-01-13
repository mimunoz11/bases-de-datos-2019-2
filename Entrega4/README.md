# Entrega 4 - Grupo 6 y 23
## API con mensajes


A continuación se presenta una pequeña explicación de esta entrega.

Se utilizó la aplicación de la Ayudantía como base (así como también el codigo que existía en el pdf).

El archivo a abrir es `main.py`, y en este existen las distintas funciones.

* ### Inicio
  Está en la ruta `/` y utiliza la función `home()`. Imprime un mensaje de bienvenida
* ### Mensajes
  Está en la ruta `/messages` y utliza la función `get_messages()`. Muestra una lista con todos los mensajes.
* ### Ver mensaje
    Está en la ruta `/messages/:id` y utiliza la función `get_messages()`. Al momento de escribir esto, los id del 1 al 26 deberían poder ser vistos.

* ### Buscar proyecto
    Está en la ruta `/messages/project-search?nombre=:nombre_proyecto`, y utiliza la función `project_search()`. Se utiliza *GET* para obtener el nombre del proyecto a buscar en la url.
    Algunos proyectos a buscar son: Anheuser-Busch Inbev SA, Isla Guarello y Talcuna
* ### Buscar mensaje
    Está en la ruta `/messages/content-search` y utiliza la función `content_search()`. Se utiliza *GET* para obtener los datos de la búsqueda entregados en un JSON con los "atributos" *forbidden*, *desired* y *required*. Estos pueden ser dados como string o lista.
* ### Crear mensaje
    Está en la ruta `/messages` y utiliza la función `create_message()`. Utiliza *POST* para publicar el mensaje. Este recibe texto en formato JSON, de la forma (la id y fecha/hora son generados automáticamente al crear los mensajes):
```json
{
    "content": "mensaje",
    "metadata": {
        "sender": "Proyecto1",
        "receiver": "Proyecto2"
    } 
}
```


* ### Borrar mensaje
  Está en la ruta `/messages/:id` y utiliza la función `delete_message()`. Utiliza *DELETE* para eliminar el mensaje con la id dada.


Esto es de forma general la entrega.

¡Muchas gracias!

Saludos :D