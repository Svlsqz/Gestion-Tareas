<?php
require_once 'GestionarTareas.php';

$archivoTareas = 'tareas.txt';

$gestor = new GestionarTareas($archivoTareas);

$method = $_SERVER['REQUEST_METHOD'];
$path = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));

header('Content-Type: application/json');

?>