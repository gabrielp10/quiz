<?php

namespace App\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByName($name) 
    {
        $sql = "SELECT COUNT(*) AS totalUser FROM $this->table WHERE username = '$name';";

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetch(\PDO::FETCH_OBJ);
    }

    public function checkLogin($name, $pasword) 
    {
        $sql = "SELECT * FROM usuarios WHERE username = '$name' AND password = '$pasword';";

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetch(\PDO::FETCH_OBJ);
    }

}