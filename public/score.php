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
        <th>Quiz</th>
        <th>Pontuação</th>
    </tr>

    <?php foreach ($data['score'] as $score) { ?>

        <tr>
            <td><?= $score["nome_questionario"]?></td>
            <td><?= $score["pontuacao"]?></td>
        <tr>
    <?php } ?>
    
</table>


<?php include_once "footer.php" ?>
