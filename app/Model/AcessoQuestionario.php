<?php

namespace App\Model;

class AcessoQuestionario extends Model
{
    protected $table = 'acesso_questionarios';
    protected  $fetchType = \PDO::FETCH_OBJ;

    public function __construct()
    {
        parent::__construct();
    }

    public function getQuestionarioAberto($idUsuario)
    {
        $sql = "SELECT 
                fk_questionarios
            FROM acesso_questionarios aq 
            WHERE aq.fk_usuarios = $idUsuario
            AND terminado_em IS NULL
            LIMIT 1";
        $this->conexao->query($sql);

        $response = $this->conexao->execute()->fetch($this->fetchType);

        return !isset($response->fk_questionarios) ? null : $response->fk_questionarios;
    }

    public function checkAcessoQuestionario($idQuestionario, $idUsuario)
    {
        $sql = "SELECT 
                    fk_questionarios
                FROM acesso_questionarios aq 
                WHERE aq.fk_usuarios = $idUsuario
                AND terminado_em IS NULL
                LIMIT 1";
        $this->conexao->query($sql);

        $response = $this->conexao->execute()->fetch($this->fetchType);

        if (!$response) {
            $this->save(
                [
                    'fk_questionarios' => $idQuestionario,
                    'fk_usuarios' => $idUsuario
                ]
            );
            return $idQuestionario;
        }
        return $response->fk_questionarios;
    }

    public function encerrarQuestionario($idUsuario)
    {
        $sql = "SELECT 
                id,
                fk_questionarios
            FROM acesso_questionarios aq 
            WHERE aq.fk_usuarios = $idUsuario
            AND terminado_em IS NULL
            LIMIT 1";
        $this->conexao->query($sql);

        $response = $this->conexao->execute()->fetch($this->fetchType);

        if ($response) {

            $this->update(
                $response->id,
                [
                    'terminado_em' => gmdate("Y-m-d H:i:s", time())
                ]
            );
        }
    }
}
