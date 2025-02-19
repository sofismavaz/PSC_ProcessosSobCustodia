<?php

class Database {
    private $host = "127.0.0.1";
    private $port = "3306"; // porta padrão do MySQL
    private $dbName = "Processos";
    private $user = "cadProcess";
    private $password = "cadProcess";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbName, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            die();
        }
    }
}

</php>