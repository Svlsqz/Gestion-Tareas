<?php
class Tarea{
    private $id;
    private $descripcion;
    private $completada;

    public function __construct($id, $descripcion, $completada = false){
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->completada = $completada;
    }

    public function getId(){
        return $this->id;
    }

    public function tareaCompletada(){
        $this->completada = true;
    }

    public function isCompletada(){
        return $this->completada;
    }

    public function __toString(){
        return "Tarea: {$this->descripcion} " . ($this->completada ? "Completada" : "Pendiente");
    }

}
?>