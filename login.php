<!DOCTYPE html>
<html>
<head>
  <title>Quiz - Linux </title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<body>



  <div class="container"> <!-- Inicio container -->
    <h1 class="display-4 text-center card-header"> Bem  vindo ao Quiz! <h1> <br>

    <div class="row"> <!-- Login -->
        <div class="col-lg-6">
          <div class="card">
          <h2 class="text-center card-header"> Login </h2>

          <form action="validacao.php" method="post">

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

            <form action="cadastro.php" method="post">

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
