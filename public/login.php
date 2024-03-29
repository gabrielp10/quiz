<?php
   $message = getMessage('login');
   include_once("./navbar.php")
?>

<h1 class="display-4 text-center card-header"> Bem  vindo ao Quiz! </h1>
<div class="container login-container">
   <?php if (!is_null($message)): ?>
   <div class="alert alert-<?= $message['type'] ?>">
      <?= $message['text'] ?>
   </div>
   <?php endif ?>
   <div class="row">
      <div class="col-md-6 login-form-1">
         <h3>Login</h3>
         <form action=<?= $data['routeLogin'] ?> method="post">
            <div class="form-group wrap-input100">
               <input type="text" name="usuario" class="form-control input100" placeholder="Insira seu usuário *" value="" />
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="form-group wrap-input100">
               <input type="password" name="senha" class="form-control input100" placeholder="Insira sua senha *" value="" />
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="form-group">
               <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group">
               <a href="#" class="Login">Esqueceu sua senha?</a>
            </div>
         </form>
      </div>
      <div class="col-md-6 login-form-2">
         <h3 class="">Cadastro</h3>
         <form action="<?= $data['routeRegister'] ?>" method="post">
            <div class="form-group wrap-input100">
               <input type="text" name="usuario" class="form-control input100" placeholder="Insira seu usuário *" value="" />
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="form-group wrap-input100">
               <input type="email" name="email" class="form-control input100" placeholder="Insira seu E-mail *" value="" />
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="form-group wrap-input100">
               <input type="password" name="senha" class="form-control input100" placeholder="Insira sua senha *" value="" />
               <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="form-group">
               <button type="submit" class="btnSubmit"> Cadastrar </button>
            </div>
            <div class="form-group">
               <a href="#" class="Cadastro" value="Login">Cadastrar com o Google</a>
            </div>
         </form>
      </div>
   </div>
</div>
<?php include_once "footer.php" ?>