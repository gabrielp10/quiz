<?php

namespace App\Model;

class Categoria extends Model
{
  public function __construct()

  {
    parent::__construct();
  }

  protected $table = 'categorias';

  public function getQuizPorCategoria($id)
  {
    $sql = "SELECT q.nome,
                   q.descricao,
                   q.img,
                   q.id,
                   c.img as background
              FROM categorias c
                INNER JOIN subcategorias s on s.fk_categorias = c.id 
                INNER JOIN questionarios q on q.fk_subcategorias = s.id  
              WHERE c.id = $id ";

    $this->conexao->query($sql);
    return $this->conexao->execute()->fetchAll($this->fetchType);
  }  


}

