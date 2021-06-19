<?php
use App\Controller;
?>

<?php include_once("./navbar.php") ?>
  <div class="container">
      <div class="text-center">Seus pontos totais:  <?=$data['pontuacao']?>  de   <?= $data['totalQuestoes'] ?></div>
      <div class="text-center">Porcentagem de acertos: <?=$data['percentAcertos']?>%</div>
  </div>
<?php include_once("./footer.php") ?>
