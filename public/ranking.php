
<?php include_once("./navbar.php") ?>

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
              <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $pontuacao["feito_em"])->format('d/m/Y')?></td>
              <td><?= $pontuacao["pontuacao"]?></td>
          <tr>
      <?php endforeach; ?>
  </table>
</div>

<?php include_once ("./footer.php") ?>