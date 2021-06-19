<?php include_once("./navbar.php") ?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <a class="btn btn-primary text-white" onclick="requisitaPagina('<?=$data['routeNewQuiz']?>')">Criar novo quiz</a>
      <a class="btn btn-warning text-white" onclick="requisitaPagina('<?=$data['routeEditQuiz']?>')">Editar Quiz</a>
      <a class="btn btn-danger text-white"  onclick="requisitaPagina('<?=$data['routeDeleteQuiz']?>')">Excluir Quiz</a>
    </div>
    <div id="conteudo">
    </div>
  </div>
</div>