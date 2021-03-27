<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Ranking;


class QuizController
{
    private $questionario;
    private $questao;
    private $pontuacao;

    public function __construct()
    {
        $this->questionario = new \App\Model\Questionario();
        $this->questao = new \App\Model\Questao();
        $this->pontuacao = new \App\Model\Ranking();
    }

    public function quiz($id) 
    {
        $id = intval($id);

        if (!is_int($id) || $id === 0) {
            return redirect(route('home'));
        }

        $perguntas = $this->questionario->getQuestoesQuestionarioPorId($id);

        if (empty($perguntas)) {
            return redirect(route('home'));
        }

        $data = [
            "title" => "Quiz - {$perguntas[0]['questionario_titulo']}",
            "routeValidate" => route('validate'),
            "routeLogout" => route('logout'),
            "img" => $perguntas[0]['questionario_imagem'],
            "perguntas" => $perguntas
          ];

        view('quiz', $data);
    }

    public function check()
    {
        $request = request()->all();

        if(isset($request['Enviar'])){

            if(!empty($request['quizcheck'])){
        
              $count = count($request['quizcheck']);
        
              $resultado = 0;
              $i = 0;
        
              $selecionado = $request['quizcheck'];
        
              $idsQuestoes = implode(', ', array_keys($selecionado));
        
              $respostas = $this->questao->getRespostasPorIds($idsQuestoes);

              $resultado = 0;
        
              foreach($respostas as $resposta){

                if($selecionado[$resposta['id']] === $resposta['resposta']){
                  $resultado++;
                }
                $i++;
              }
        
              echo "<br> Seus pontos totais: $resultado de $i";
        
            }
        
          }
    }

    public function ranking(){

      $pontuacoes = $this->pontuacao->getRanking();

      $data = [
        "title" => "Quiz - Ranking",
        "pontuacoes" => $pontuacoes,
        "routeLogout" => route('logout')
      ];

      view ('ranking', $data);

    }
}
