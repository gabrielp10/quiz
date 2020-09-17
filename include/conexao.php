<?php

$user = 'root';
$password = '12@Teste';

$con = mysqli_connect('localhost', $user, $password);

if ($con) {
  echo "Conexao realizada";
}
else{
  die("Sem conexao");
}

