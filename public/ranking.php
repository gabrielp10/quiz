<?php require_once "../app/config.php"; ?>
<?php require_once APP . "/validacao_acesso.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/assets/css/estilo.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets/js/bootstrap.min.js"></script></head>

</head>

<?php include_once("./navbar.php") ?>

<table class="container">
    <tr>
        <th>Usuário</th>
        <th>Quiz</th>
        <th>Pontuação</th>
    </tr>

    <?php foreach ($data['pontuacoes'] as $pontuacao) { ?>

        <tr>
            <td><?= $pontuacao["nome_usuario"] . '  ' ?></td>
            <td><?= $pontuacao["nome_questionario"]?></td>
            <td><?= $pontuacao["pontuacao"]?></td>
        <tr>
    <?php } ?>
    
</table>


<?php include_once "footer.php" ?>
