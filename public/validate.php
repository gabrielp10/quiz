<?php
use App\Controller;
?>

<?php include_once("./navbar.php") ?>
  <div class="container">
      <div class="text-center">Seus pontos totais:  <?=$data['pontuacao']?>  de   <?= $data['totalQuestoes'] ?></div>
      <div class="progress">
        <div class="progress-bar bg-<?=$data['percentAcertosBar']?>" role="progressbar" style="width: <?=$data['percentAcertos']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?=$data['percentAcertos']?>%</div>
      </div>
  </div>
<?php include_once("./footer.php") ?>
