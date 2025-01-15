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
}
?>