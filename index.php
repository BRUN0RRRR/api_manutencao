<?php
require_once "config/database.php";
require_once "controllers/ChamadoController.php";

header("Content-Type: application/json");

$db = (new Database())->conectar();
$controller = new ChamadoController($db);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($uri == "/api/chamados" && $method == "GET") {
    $controller->listar();
}

if ($uri == "/api/chamados" && $method == "POST") {
    $controller->criar();
}

if (preg_match("/\/api\/chamados\/(\d+)/", $uri, $matches) && $method == "PUT") {
    $controller->atualizarStatus($matches[1]);
}
