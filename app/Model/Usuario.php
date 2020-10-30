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

}