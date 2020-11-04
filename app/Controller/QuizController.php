<?php

namespace App\Controller;

class QuizController
{
    private $questionario;
    private $questao;

    public function __construct()
    {
        $this->questionario = new \App\Model\Questionario();
        $this->questao = new \App\Model\Questao();
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
            "perguntas" => $perguntas        ];

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
}
