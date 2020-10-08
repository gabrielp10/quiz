<?php

namespace App\Model;

class Model
{
    protected $table;

    public function all()
    {
        return $sql = "SELECT * FROM $this->table;";
    }

    public function save($data)
    {
        $data = array_filter($data, fn($value) => !is_null($value));

        $fields = implode(',', array_keys($data));
        $values =implode(',', array_values($data)); 

        $sql = "INSERT INTO $this->table ($fields)
                VALUES ($values);";
        return $sql;
    }

}