<?php

namespace App\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAlternativasQuestionarioPorId($id)
    {
        $sql = "SELECT
                a.alternativa,
                a.id AS id_alternativa
                FROM alternativas a 
                inner join questoes q on q.id = a.fk_questoes 
                WHERE q.id = $id";

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetchAll($this->fetchType);
    }
    
    public function getRespostasAlternativasQuestionarioPorId($id)
    {
        $sql = "SELECT
                a.alternativa,
                a.id AS id_alternativa,
                a.resposta
                FROM alternativas a 
                inner join questoes q on q.id = a.fk_questoes 
                WHERE a.id = $id";

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetchAll($this->fetchType);
    }
    
}