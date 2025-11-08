<?php

//conexion a db desde una clase

class DatabaseConnection
{
    private $host = "localhost";
    private $dbname = "dblaguaca";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>conexion exitosa</h1>";
        } catch (PDOException $e) {
            echo "error al conectarse a la db" . $e->getMessage();
        }
    }
}
