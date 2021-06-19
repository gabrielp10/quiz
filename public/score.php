<!DOCTYPE html>
<html>
  <head>
      <?php include_once("./navbar.php") ?>
  </head>
  <body>
    <div class="container">
      <table class="table table-striped text-center border font-weight-bold">
        <tr>
            <th>Quiz</th>
            <th>Pontuação</th>
        </tr>

        <?php foreach ($data['score'] as $score): ?>

        <tr class="mouseColor">
            <td ><?= $score["nome_questionario"]?></td>
            <td><?= $score["pontuacao"]?></td>
        <tr>

        <?php endforeach; ?>      
      </table>
    </div>
    <?php include_once "footer.php" ?>
  </body>
</html>

