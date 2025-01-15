# Gestión de Tareas

Esta aplicación permite gestionar un alista de tareas a través de una interfaz de consola y una API RESTful.

## Requisitos

- PHP 7.4 o superior
- Servidor web

## Instalación

1. Clona el repositorio:
    ```sh
    git clone https://github.com/Svlsqz/Gestion-Tareas.git
    cd gestion_tareas
    ```

2. Asegúrate de que el servidor web esté configurado para servir el directorio del proyecto.

## Uso


### Consola

Para interactuar con la aplicación desde la consola, ejecuta el archivo [index.php]

```sh
php index.php
```

### API RESTful

La API RESTful permite realizar las siguientes operaciones:

- **POST /tareas**: Añadir una nueva tarea.
    ```sh
    curl -X POST -H "Content-Type: application/json" -d '{"descripcion": "Nueva tarea"}' http://localhost/gestion_tareas/api.php/tareas
    ```

- **DELETE /tareas/{id}**: Eliminar una tarea.
    ```sh
    curl -X DELETE http://localhost/gestion_tareas/api.php/tareas/1
    ```

- **PUT /tareas/{id}**: Marcar una tarea como completada.
    ```sh
    curl -X PUT http://localhost/gestion_tareas/api.php/tareas/1
    ```

- **GET /tareas**: Listar todas las tareas pendientes.
    ```sh
    curl -X GET http://localhost/gestion_tareas/api.php/tareas
    ```

- **GET /tareas/{id}**: Obtener los detalles de una tarea específica.
    ```sh
    curl -X GET http://localhost/gestion_tareas/api.php/tareas/1
    ```
