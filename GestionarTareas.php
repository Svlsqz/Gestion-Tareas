<?php
include 'Tarea.php';

class GestionarTareas {
    private $tareas =[];

    public function agregarTarea($descripcion) {
        $id = count($this->tareas) + 1; 
        $nuevaTarea = new Tarea($id, $descripcion);
        $this->tareas[] = $nuevaTarea;
        echo "Tarea añadida: {$descripcion} (ID: {$id})\n";
    }   

    public function eliminarTarea($id) {
        foreach ($this->tareas as $key => $tarea) {
            if ($tarea->getId() == $id) {
                unset($this->tareas[$key]);
                echo "Tarea con ID {$id} eliminada.\n";
                return;
            }
        }
        echo "Tarea con ID {$id} no encontrada.\n";
    }

    public function marcarTareaCompletada($id) {
        foreach ($this->tareas as $tarea) {
            if ($tarea->getId() == $id) {
                $tarea->marcarCompletada();
                echo "Tarea con ID {$id} marcada como completada.\n";
                return;
            }
        }
        echo "Tarea con ID {$id} no encontrada.\n";
    }
    
}
?>