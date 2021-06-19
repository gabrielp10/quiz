<!DOCTYPE html>
<html>
  <head>
    <?php include_once("./navbar.php") ?>
  </head>
  <body>
    <form id="selecionaQuiz" class="btn-group">
      <button type="button" class="ml-2 btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Selecione um quiz
      </button>
      <div class="dropdown-menu dropdown-menu-right" onchange="selecionaQuiz()">
        <?php foreach ($data['quizzes'] as $quiz): ?>
        <button class="dropdown-item" value="<?=$quiz['id']?>" type="button"><?=$quiz['nome']?></button>
        <?php endforeach ?>
      </div>
    </form>
    <div class="container">
      <table class="table table-striped text-center border font-weight-bold">
          <tr>
              <th>Usuário</th>
              <th>Quiz</th>
              <th>Feito em</th>
              <th>Pontuação</th>
          </tr>

          <?php foreach ($data['pontuacoes'] as $pontuacao): ?>

              <tr class="mouseColor">
                  <td><?= $pontuacao["nome_usuario"] . '  ' ?></td>
                  <td><?= $pontuacao["nome_questionario"]?></td>
                  <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $pontuacao["feito_em"])->format('d-m-Y')?></td>
                  <td><?= $pontuacao["pontuacao"]?></td>
              <tr>
          <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>

<?php include_once ("./footer.php") ?>