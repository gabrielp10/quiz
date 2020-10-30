<?php
  require_once "../app/config.php";
  $message = getMessage('login');
?>

<!DOCTYPE html>
<html>
<head>
  <title><?=TITLE?> - Index</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="assets/js/bootstrap.min.js"></script></head>

<body>

<?php include_once "navbar.php" ?>

  <div class="container"> <!-- Inicio container -->
    <?php if (!is_null($message)): ?>
      <div class="alert alert-<?= $message['type'] ?>">
        <?= $message['text'] ?>
      </div>
    <?php endif ?>
    <h1 class="display-4 text-center card-header"> Bem  vindo ao Quiz! <h1> <br>

    <div class="row"> <!-- Login -->
        <div class="col-lg-6">
          <div class="card">
          <h2 class="text-center card-header"> Login </h2>

          <form action=<?="../app/validacao.php"?> method="post">

            <div class="form-group">
              <label> Usuário: </label>
              <input type="text" name="usuario" class="form-control">
            </div>

            <div class="form-group">
              <label> Senha: </label>
              <input type="password" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary"> Login </button>

          </form>

          </div>
        </div>

        <div class="col-lg-6"> <!-- Cadastro -->
          <div class="card">
            <h2 class="text-center card-header"> Cadastrar </h2>

            <form action="<?= $data['routeRegister']?>" method="post">

              <div class="form-group">
                <label> Usuário: </label>
                <input type="text" name="usuario" class="form-control">
              </div>

              <div class="form-group">
                <label> Senha: </label>
                <input type="password" name="senha" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary"> Cadastrar </button>

            </form>
        </div>
      </div>

    </div> <!-- Fim container -->
</div>

<?php include_once "footer.php" ?>

</body>
</html>
