<?php require_once "../app/config.php"; ?>
<?php require_once APP . "/validacao_acesso.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/assets/css/estilo.css">
  <link rel="stylesheet" href="/public/assets/js/main.js">
  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets/js/bootstrap.min.js"></script></head>

</head>

<?php include_once("./navbar.php") ?>


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


<table class="container text-center border">
    <tr>
        <th>Usuário</th>
        <th>Quiz</th>
        <th>Feita em</th>
        <th>Pontuação</th>
    </tr>

    <?php foreach ($data['pontuacoes'] as $pontuacao) { ?>

        <tr>
            <td><?= $pontuacao["nome_usuario"] . '  ' ?></td>
            <td><?= $pontuacao["nome_questionario"]?></td>
            <td><?=$pontuacao["feito_em"]?></td>
            <td><?= $pontuacao["pontuacao"]?></td>
        <tr>
    <?php } ?>
    
</table>


<?php include_once ("./footer.php") ?>