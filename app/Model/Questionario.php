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
                q.nome AS questionario_titulo,
                q.img AS questionario_imagem,
                qt.descricao AS pergunta,
                qt.id AS id_questao,
                qt.alternativa_a,
                qt.alternativa_b,
                qt.alternativa_c,
                qt.alternativa_d,
                qt.alternativa_e
            FROM questionarios q
            INNER JOIN questoes qt ON qt.fk_questionarios = q.id
            WHERE q.id = $id";

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetchAll($this->fetchType);

        
    }
}