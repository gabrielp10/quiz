<?php
use App\Controller;
?>
  <div class="container text-center">
    <h3 class=" card-header"><strong><?=$data['title']?></strong></h3>
    <?php if (empty($data['img'])) : ?>
      <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
        <rect width="100%" height="100%" fill="#79999c"></rect>
      </svg>
    <?php else : ?>
        <img class="card-img-top mt-2" src="<?= "/public/assets/img/{$data['img']}" ?>" width="100%" height="100%" alt="Card image cap" />
    <?php endif;?>
    <h3><?=$data['descricao']?></h3>
    <a class="btn btn-indigo btn-rounded btn-lg btn-outline-secondary" href="<?= "$data[routeQuiz]/$data[idQuestionario]" ?>">Iniciar</a>
    <h3 class="card-header">Top 10</h3>
    <table class="table table-striped border font-weight-bold">
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
