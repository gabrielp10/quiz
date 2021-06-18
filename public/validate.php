<?php
use App\Controller;
?>

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

<div class="container">
    <div class="text-center">Seus pontos totais:  <?=$data['pontuacao']?>  de   <?= $data['totalQuestoes'] ?></div>
    <div class="text-center">Porcentagem de acertos: <?=$data['percentAcertos']?>%</div>



</div>


<?php include_once("./footer.php") ?>
