<?php
class Database {
    private $host = "barbearia-dev.mysql.uhserver.com";
    private $db_name = "barbearia-dev";
    private $username = "barbearia_admin";
    private $password = "";
    public $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        return $this->conn;
    }
}
