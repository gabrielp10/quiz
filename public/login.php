<?php
echo '<pre>';
print_r($data);
echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="assets/js/bootstrap.min.js"></script></head>

<body>

<?php include_once "navbar.php" ?>

  <div class="container"> <!-- Inicio container -->
    <h1 class="display-4 text-center card-header"> Bem  vindo ao Quiz! <h1> <br>

    <div class="row"> <!-- Login -->
        <div class="col-lg-6">
          <div class="card">
          <h2 class="text-center card-header"> Login </h2>

          <form action="../src/validacao.php" method="post">

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

</body>
</html>