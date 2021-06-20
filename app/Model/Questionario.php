<?php

namespace App\Model;

class Questionario extends Model
{
    protected $table = 'questionarios';

    public function __construct()
    {
        parent::__construct();
    }

    public function getQuestoesQuestionarioPorId($id)
    {
        $sql = "SELECT 
                  q.descricao AS pergunta,
                  qst.nome AS questionario_titulo,
                  qst.img AS questionario_imagem,
                  q.id AS id
                FROM questoes q 
                INNER JOIN questionarios qst ON q.fk_questionarios = qst.id 
                WHERE qst.id = $id";
        $this->conexao->query($sql);
        return $this->conexao->execute()->fetchAll($this->fetchType);
    }
}