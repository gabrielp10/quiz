<?php include_once("./navbar.php") ?>
  <div class="container">
    <table class="table table-striped text-center border font-weight-bold">
      <tr>
          <th>Quiz</th>
          <th>Pontuação</th>
          <th>Feito em</th>
      </tr>

      <?php foreach ($data['score'] as $score): ?>

      <tr class="mouseColor">
          <td ><?= $score["nome_questionario"]?></td>
          <td><?= $score["pontuacao"]?></td>
          <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $score["feito_em"])->format('d/m/Y')?></td>
      <tr>

      <?php endforeach; ?>   
         
    </table>
  </div>
<?php include_once "footer.php" ?>



