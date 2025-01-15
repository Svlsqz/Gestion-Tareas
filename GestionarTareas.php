<?php
include 'Tarea.php';

class GestionarTareas {
    private $tareas =[];
    private $archivo;

    public function __construct($archivo) {
        $this->archivo = $archivo;

        if (!file_exists($archivo)) {
            file_put_contents($archivo, '');
        }

        $this->tareas = $this->cargarTareas();
    }

    private function cargarTareas() {
        if (!file_exists($this->archivo)) {
            return [];
        }
        $contenido = file_get_contents($this->archivo);
        $tareas = unserialize($contenido); // Deserializar las tareas
        return $tareas ? $tareas : [];
    }

    public function agregarTarea($descripcion) {
        $id = count($this->tareas) + 1; 
        $nuevaTarea = new Tarea($id, $descripcion);
        $this->tareas[] = $nuevaTarea;
        $this->guardarTareas();
        echo "Tarea añadida: {$descripcion} (ID: {$id})\n";
    }   

    public function eliminarTarea($id) {
        $this->tareas = array_filter($this->tareas, function($tarea) use ($id) {
            return $tarea->getId() != $id;
        });
        $this->guardarTareas();
    }

    public function marcarTareaCompletada($id) {
        foreach ($this->tareas as $tarea) {
            if ($tarea->getId() == $id) {
                $tarea->tareaCompletada();
                echo "Tarea con ID {$id} marcada como completada.\n";
                $this->guardarTareas();
                return;
            }
        }
        echo "Tarea con ID {$id} no encontrada.\n";
    }

    public function listarTareasPendientes() {
        echo "Tareas pendientes:\n";
        $pendientes = array_filter($this->tareas, function($tarea) {
            return !$tarea->isCompletada();
        });

        foreach ($pendientes as $tarea) {
            echo $tarea . PHP_EOL;
        }
    }

    private function guardarTareas() {
        $contenido = serialize($this->tareas);
        file_put_contents($this->archivo, $contenido);
    }
    
    
    
}
?>