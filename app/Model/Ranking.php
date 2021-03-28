<?php

namespace App\Model;

class Ranking extends Model
{
    protected $table = 'pontuacoes';

    public function __construct()
    {
        parent::__construct();
    }

    public function getRanking()
    {
        $sql = "SELECT p.id,
        u.username  AS nome_usuario,
        q.nome      AS nome_questionario,
        p.pontuacao AS pontuacao
        FROM   pontuacoes AS p
        JOIN usuarios u
          ON u.id = p.fk_usuario
        JOIN questionarios q
          ON q.id = p.fk_questao ORDER BY pontuacao DESC" ;

        $this->conexao->query($sql);
        return $this->conexao->execute()->fetchAll($this->fetchType);
    }

    public function getScore($usuario)
    {
      $sql = "SELECT p.id,
      u.username  AS nome_usuario,
      q.nome      AS nome_questionario,
      p.pontuacao AS pontuacao
      FROM   pontuacoes AS p
            JOIN usuarios u
              ON u.id = p.fk_usuario
            JOIN questionarios q
              ON q.id = p.fk_questao
      WHERE  u.username = '$usuario'
      ORDER  BY p.id DESC ";

      $this->conexao->query($sql);
      return $this->conexao->execute()->fetchAll($this->fetchType);
    }

    public function getQuizzes()
    {
      $sql = "SELECT p.id,
      u.username  AS nome_usuario,
      q.nome      AS nome_questionario,
      p.pontuacao AS pontuacao
      FROM   pontuacoes AS p
            JOIN usuarios u
              ON u.id = p.fk_usuario
            JOIN questionarios q
              ON q.id = p.fk_questao
      ORDER  BY pontuacao DESC ";

      $this->conexao->query($sql);
      return $this->conexao->execute()->fetchAll($this->fetchType);
    }

}