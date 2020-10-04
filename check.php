<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php?login=erro2');
}

//Conexão com o banco

include_once  __DIR__ . '/include/conexao.php';

  if(isset($_POST['Enviar'])){

    if(!empty($_POST['quizcheck'])){

      $count = count($_POST['quizcheck']);

      $resultado = 0;
      $i = 0;

      $selecionado = $_POST['quizcheck'];

      $idsQuestoes = array_keys($selecionado);
      $idsQuestoes = implode(', ', $idsQuestoes);

      $q = "SELECT id, resposta FROM questoes WHERE id IN ($idsQuestoes);";
      $query = mysqli_query($con, $q);
      $resultado = 0;

      while($rows = mysqli_fetch_array($query) ){

        if($selecionado[$rows['id']] === $rows['resposta']){
          $resultado++;
        }
        $i++;
      }

      echo "<br> Seus pontos totais: $resultado de $i";

    }

  }

  $nome = $_SESSION['usuario'];
  $resultadofinal = "insert into user(usuario, pergtotal, respostascorretas) values ('$nome', '2', '$resultado')";
  $queryresult = mysqli_query($con,$resultadofinal);



?>
