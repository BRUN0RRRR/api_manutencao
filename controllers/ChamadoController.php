<?php
require_once __DIR__ . "/../models/Chamado.php";

class ChamadoController {
    private $model;

    public function __construct($db) {
        $this->model = new Chamado($db);
    }

    public function criar() {
        $dados = json_decode(file_get_contents("php://input"), true);
        if ($this->model->criar($dados)) {
            echo json_encode(["msg" => "Chamado criado"]);
        }
    }

    public function listar() {
        echo json_encode($this->model->listar());
    }

    public function atualizarStatus($id) {
        $dados = json_decode(file_get_contents("php://input"), true);
        $this->model->atualizarStatus($id, $dados['status']);
        echo json_encode(["msg"=>"Status atualizado"]);
    }
}
