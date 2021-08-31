<?php
use App\Controller;
?>
  <div class="container">
    <h3 class="text-center card-header"><strong> Quiz - <?=$data['title']?> - Resultado</strong></h3>
      <?php if (empty($data['img'])) : ?>
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
          <rect width="100%" height="100%" fill="#79999c"></rect>
        </svg>
      <?php else : ?>
          <img class="card-img-top mt-2" src="<?= "/public/assets/img/quizzes/{$data['img']}" ?>" width="100%" height="100%" alt="Card image cap" />
      <?php endif;?>
      <div class="text-center"><h3>Seus pontos totais:  <?=$data['pontuacao']?>  de   <?= $data['totalQuestoes'] ?></h3></div>
        <div class="progress" style="height: 30px; width:50%; margin-left:25%;">
          <div class="progress-bar progress-bar-striped bg-<?=$data['percentAcertosBar']?>" role="progressbar" style="width: <?=$data['percentAcertos']?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?=$data['percentAcertos']?>%</div>
        </div>
    <h3 class="text-center card-header">Top 10</h3>
    <table class="table table-striped text-center border font-weight-bold">
      <tr>
          <th>Usuário</th>
          <th>Feito em</th>
          <th>Pontuação</th>
      </tr>

      <?php foreach ($data['rankingTop10'] as $pontuacao): ?>

          <tr class="mouseColor">
              <td><?= $pontuacao["nome_usuario"] . '  ' ?></td>
              <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $pontuacao["feito_em"])->format('d/m/Y')?></td>
              <td><?= $pontuacao["pontuacao"]?></td>
          <tr>
      <?php endforeach; ?>
  </table>
  </div>
