<?php
// Incluir las clases necesarias
include 'GestionarTareas.php';

// Ruta del archivo donde se guardarán las tareas
$archivoTareas = 'tareas.txt';

// Crear una instancia de la clase GestionarTareas, pasando el archivo de tareas
$gestionarTareas = new GestionarTareas($archivoTareas);

// Menú interactivo en consola para gestionar tareas
do {
    echo "\n--- Menú de Gestión de Tareas ---\n";
    echo "1. Añadir tarea\n";
    echo "2. Eliminar tarea\n";
    echo "3. Marcar tarea como completada\n";
    echo "4. Listar tareas pendientes\n";
    echo "5. Guardar tareas\n";
    echo "6. Salir\n";
    echo "Seleccione una opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            // Añadir tarea
            echo "Ingrese la descripción de la tarea: ";
            $descripcion = trim(fgets(STDIN));
            $gestionarTareas->agregarTarea($descripcion);
            break;

        case 2:
            // Eliminar tarea
            echo "Ingrese el ID de la tarea a eliminar: ";
            $idEliminar = trim(fgets(STDIN));
            $gestionarTareas->eliminarTarea($idEliminar);
            break;

        case 3:
            // Marcar tarea como completada
            echo "Ingrese el ID de la tarea a marcar como completada: ";
            $idCompletar = trim(fgets(STDIN));
            $gestionarTareas->marcarTareaCompletada($idCompletar);
            break;

        case 4:
            // Listar tareas pendientes
            $gestionarTareas->listarTareasPendientes();
            break;


        case 6:
            // Salir
            echo "Saliendo...\n";
            break;

        default:
            echo "Opción no válida. Intente nuevamente.\n";
            break;
    }
} while ($opcion != 6);
?>
