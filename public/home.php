<?php 

$message = getMessage('acesso_questionario');
if (!is_null($message)) :
?>
  <div class="alert alert-<?= $message['type'] ?>">
    <?= $message['text'] ?>
  </div>
<?php endif; ?>

<section class="jumbotron text-center">
    <h1>Bem vindo(a) ao Quiz, <?= $_SESSION['usuario']; ?></h1>
    <p class="lead text-muted">Selecione um quiz para iniciar</p>
    <p>
      <a href="<?= $data['routeScore'] ?>" class="btn btn-primary my-2">Resultados Anteriores</a>
      <a href="<?= $data['routeRanking'] ?>" class="btn btn-secondary my-2">Ranking Geral</a>
    </p>
    
      <!-- Pesquisa -->
    <div class="container">
      <div class="input-group rounded ">
        <input type="search" class="form-control rounded" name="buscar" id="buscar" placeholder="Pesquise por um questionário" aria-label="Search"
          aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
      </div>
      <div class='mb-3 bg-white' style="position: absolute; z-index: 1;" id="resultado" hidden></div>
    </div>
</section>
  <div class="container-fluid">
  <!-- Inicio categorias -->
  <?php foreach ($data['categorias'] as $key => $categoria) : ?>
    <div class="row pt-4 parallax" style="background-image: url('/public/assets/img/categoriesBackground/<?= $data['categorias'][$key]['img'] ?>')">
      <!-- Inicio quizzes -->
      <div class="container">
      <h3 ><a class="hvr-1 titulosQuestionarios" href="#"><?= $data['categorias'][$key]['Nome'] ?></a></h3>
      <hr color="white" class="my-4">
      <div class="card-deck pb-4">
        <?php $i = 0; foreach ($data['quizzes'][$key] as $quiz) : ?>
          <!-- Cards quizzes por categoria -->
          <div class="card hvr-reveal col-md-4 col-sm-4 col-lg-4">
            <div class="view overlay">
              <?php if (empty($data['quizzes'][$key][$i]['img'])) : ?>
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
                  <rect width="100%" height="100%" fill="#79999c"></rect>
                </svg>
              <?php else : ?>
                <a href="<?= "$data[routeDashQuiz]/" . $data['quizzes'][$key][$i]['id'] ?>"><img class="card-img-top mt-2" src="<?= "/public/assets/img/quizzes/{$data['quizzes'][$key][$i]['img']}" ?>" width="335px" height="215px" alt="Card image cap" title="<?=$data['quizzes'][$key][$i]['descricao']?>"/></a>
              <?php endif; ?>
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $data['quizzes'][$key][$i]['nome'] ?></h5>
              <hr>
              <p class="card-text"><?= $data['quizzes'][$key][$i]['descricao'] ?></p>
              <a href="<?= "$data[routeDashQuiz]/$quiz[id]"?>">Detalhes</a>
            </div>
            <p class="text-sm-left text-muted">Criado por <a href="#" class="text-reset"></a>.</p>
            <div class="row justify-content-end ">
              <?php
              if ($data['idQuestionarioAberto'] == $quiz['id']) :
              ?>
                <a class="btn btn-indigo btn-rounded btn-md btn-success col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Continuar</a>
              <?php
              else :
              ?>
                <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Iniciar</a>
              <?php endif ?>
            </div>
          </div>
        <?php $i++; endforeach ?>
      </div>
              </div>
    </div>
    <!-- Fim quizzes -->
  <?php endforeach ?>
  <!-- Fim categorias -->
</div>

<script type="text/javascript">
  const resultado = document.getElementById('resultado');

	function buscarNome(nome) {
		$.ajax({
			url: "search.php",
			method: "POST",
			data: {nome:nome},
			success: function(data){
				$('#resultado').html(data);
			}
		});
	}

	$(document).ready(function(){
		buscarNome();

		$('#buscar').keyup(function(){
			var nome = $(this).val();
			if (nome != ''){
        resultado.removeAttribute("hidden");
				buscarNome(nome);
			}
			else
			{
				buscarNome();
        resultado.setAttribute("hidden", true);
			}
		});
	});
</script>

