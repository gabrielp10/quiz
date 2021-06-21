<?php

namespace App\Model;

use App\Model\Conexao;

class Model
{
    protected $table;
    protected $conexao;
    protected $fetchType = \PDO::FETCH_ASSOC;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function all()
    {
        $sql = "SELECT * FROM $this->table;";

        return $this->conexao->con->query($sql)->fetchAll($this->fetchType);
    }

    public function fetchType($fetchType)
    {
        $this->fetchType = $fetchType;
    }

    public function save($data)
    {
        $data = array_filter($data, fn ($value) => !is_null($value));

        $fields = implode(',', array_keys($data));
        $valuesSth = implode(',', array_fill(0, count($data), '?'));

        $this->conexao->query("INSERT INTO $this->table ($fields) VALUES ($valuesSth);");

        $save =  $this->conexao->execute(array_values($data));

        if ($save) {
            return  $this->conexao->con->lastInsertId();
        }

        return false;
    }

    public function update($id, $data)
    {
        $data = array_filter($data, fn ($value) => !is_null($value));

        $set = "";
        foreach (array_keys($data) as $field) {
            $set .= "$field = ?,";
        }

        $set = rtrim($set, ',');

        $this->conexao->query("UPDATE $this->table SET $set WHERE id = $id;");

        $save =  $this->conexao->execute(array_values($data));

        if ($save) {
            return  $this->conexao->con->lastInsertId();
        }

        return false;
    }
}
