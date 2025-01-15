<?php
require_once 'GestionarTareas.php';

$archivoTareas = 'tareas.txt';

$gestor = new GestionarTareas($archivoTareas);

$method = $_SERVER['REQUEST_METHOD'];
$path = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));

header('Content-Type: application/json');

switch ($method) {
    case 'POST':
        if ($path[0] === 'tareas') {
            $input = json_decode(file_get_contents('php://input'), true);
            if (isset($input['descripcion'])) {
                $gestor->agregarTarea($input['descripcion']);
                echo json_encode(['message' => 'Tarea añadida correctamente']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Descripción de la tarea requerida']);
            }
        }
        break;

    case 'DELETE':
        // DELETE /tareas/{id}: Para eliminar una tarea
        if ($path[0] === 'tareas' && isset($path[1])) {
            $id = (int)$path[1];
            $gestor->eliminarTarea($id);
            echo json_encode(['message' => "Tarea con ID $id eliminada correctamente"]);
        }
        break;

    case 'PUT':
        // PUT /tareas/{id}: Para marcar una tarea como completada
        if ($path[0] === 'tareas' && isset($path[1])) {
            $id = (int)$path[1];
            $gestor->marcarTareaCompletada($id);
            echo json_encode(['message' => "Tarea con ID $id marcada como completada"]);
        }
        break;

    case 'GET':
        if ($path[0] === 'tareas') {
            if (isset($path[1])) {
                // GET /tareas/{id}: Para obtener los detalles de una tarea específica
                $id = (int)$path[1];
                $tarea = $gestor->obtenerTarea($id);
                if ($tarea) {
                    echo json_encode($tarea);
                } else {
                    http_response_code(404);
                    echo json_encode(['error' => 'Tarea no encontrada']);
                }
            } else {
                // GET /tareas: Para listar todas las tareas pendientes
                ob_start();
                $gestor->listarTareasPendientes();
                $output = ob_get_clean();
                echo json_encode(['tareas' => $output]);
            }
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
