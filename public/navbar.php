<!DOCTYPE html>
<html>
  <head>
    <title><?= $data['title'] ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/estilo.css">
    <script src="/public/assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/public/assets/js/popper.min.js"></script>
    <script src="/public/assets/js/main.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/public/assets/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-3 bg-dark">
      <a class="navbar-brand" href="/"><i class="far fa-question-circle fa-lg">&nbsp</i>Quiz</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
        </ul>
          <span class="form-inline  my-2 my-lg-0">
            <a class="btn-rounded btn btn-md btn-outline-warning mr-3" 
            <?= !isset($data['routeAdPanel']) ? 'hidden' : "href=\"" . $data['routeAdPanel'] . "\" >Painel Administrativo</a> "?>
          </span>
          <span>
            <a <?= $_SERVER['REQUEST_URI'] == '/login' ? 'hidden' : "href=\"" . $data['routeLogout'] . "\"" ?> class=" btn btn-rounded btn-md btn-outline-info"> Logout </a>
          </span>
      </div>
    </nav>
