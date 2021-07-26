<?php

namespace App\Model;

class Conexao
{
    private $db = DATABASE;
    private $host = DATABASE_HOST;
    private $user = DATABASE_USER;
    private $password = DATABASE_PASSWORD;
    private $database = DATABASE_NAME;
    private $encoding = 'utf8';
    private $stmt;
    public $con;

    public function __construct()
    {
        $dsn = "$this->db:dbname=$this->database;host=$this->host;charset=$this->encoding";
        $opcoes = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->con = new \PDO($dsn, $this->user, $this->password, $opcoes);
        } catch (\PDOException $e) {
            print("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function query($query)
    {
        return $this->stmt = $this->con->prepare($query);
    }

    public function execute($data = null)
    {
        $this->stmt->execute($data);
        return $this->stmt;
    }
}
