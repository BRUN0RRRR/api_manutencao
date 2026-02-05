<?php
class Chamado {
    private $conn;
    private $table = "chamados";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar($dados) {
        $sql = "INSERT INTO {$this->table}
                (titulo, descricao, prioridade, usuario_id)
                VALUES (:titulo, :descricao, :prioridade, :usuario_id)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($dados);
    }

    public function listar() {
        $sql = "SELECT c.*, u.nome AS solicitante
                FROM chamados c
                JOIN usuarios u ON u.id = c.usuario_id
                ORDER BY c.criado_em DESC";

        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarStatus($id, $status) {
        $sql = "UPDATE chamados SET status = :status, atualizado_em = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(["status"=>$status, "id"=>$id]);
    }
}
