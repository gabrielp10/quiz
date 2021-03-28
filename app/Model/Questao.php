<?php

namespace App\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    public function __construct()
    {
        parent::__construct();
    }

    public function getRespostasPorIds($ids)
    {
        $sql = "SELECT id, resposta, fk_questionarios
                FROM questoes
                WHERE id IN ($ids);";

        $this->conexao->query($sql);

        return $this->conexao->execute()->fetchAll($this->fetchType);
    }
    
    
}