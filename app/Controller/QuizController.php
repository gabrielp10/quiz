<?php

namespace App\Controller;

use App\Model\AcessoQuestionario;
use App\Model\Questao;
use App\Model\Questionario;
use App\Model\Pontuacao;
use Src\Request;
use Src\Route;


class QuizController
{
    private $acessoQuestionario;
    private $questionario;
    private $questao;
    private $pontuacao;

    public function __construct()
    {
        $this->questionario = new Questionario();
        $this->acessoQuestionario = new AcessoQuestionario();
        $this->questao = new Questao();
        $this->pontuacao = new Pontuacao();
    }

    public function quiz($idQuestionario)
    {
        $idQuestionario = intval($idQuestionario);

        if (!is_int($idQuestionario) || $idQuestionario === 0) {
            return redirect(route('home'));
        }

        $idQuestionarioAberto = $this->acessoQuestionario->checkAcessoQuestionario($idQuestionario, $_SESSION['id']);
        if ($idQuestionarioAberto != $idQuestionario) {
            $questionarioAberto = $this->questionario->getQuestoesQuestionarioPorId($idQuestionarioAberto);
            $titulo = $questionarioAberto[0]['questionario_titulo'];
            message('acesso_questionario', "Você ainda não concluiu o questionario $titulo!", 'warning');
            return redirect(route('home'));
        }

        $perguntas = $this->questionario->getQuestoesQuestionarioPorId($idQuestionario);
        $alternativas = $this->questao->getAlternativasQuestionarioPorId($perguntas[0]['id']);

        if (empty($perguntas)) {
            return redirect(route('home'));
        }

        $data = [
            "title" => "Quiz - {$perguntas[0]['questionario_titulo']}",
            "routeValidate" => route('validate'),
            "routeLogout" => route('logout'),
            "img" => $perguntas[0]['questionario_imagem'],
            "IdQuestionarioAberto" => null,
            "perguntas" => $perguntas,
            "alternativas" => $alternativas
        ];

        view('quiz', $data);
    }

    public function check()
    {
        $request = request()->all();


        if (isset($request['Enviar'])) {

            if (!empty($request['quizcheck'])) {

                $idQuestionarioAberto = $this->acessoQuestionario->encerrarQuestionario($_SESSION['id']);

                $count = count($request['quizcheck']);

                $resultado = 0;
                $i = 0;

                $selecionado = $request['quizcheck'];

                $idsQuestoes = implode(', ', array_keys($selecionado));

                $respostas = $this->questao->getAlternativasQuestionarioPorId($idsQuestoes);

                $resultado = 0;

                foreach ($respostas as $resposta) {

                    if ($selecionado[$resposta['id']] === $resposta['resposta']) {
                        $resultado++;
                    }
                    $i++;
                }

                $percentAcertos =  ($resultado / $i) * 100;

                $data = [
                    'title' => 'Quiz - Resultado',
                    'pontuacao' => $resultado,
                    'totalQuestoes' => $i,
                    'percentAcertos' => $percentAcertos,
                    'idQuestionario' => $resposta['fk_questionarios'],
                    'routePontuacao' => route('validate'),
                    'routeLogout' => route('logout')
                ];

                $pontuacao = new Pontuacao();

                $save = $pontuacao->save(
                    [
                        'pontuacao' => $resultado,
                        'fk_questao' => $resposta['fk_questionarios'],
                        'fk_usuario' => $_SESSION['id']

                    ]

                );


                view('validate', $data);
            }
        }
    }

    public function ranking()
    {

        $pontuacoes = $this->pontuacao->getRanking();
        $quizzes = $this->questionario->all();

        $data =
            [
                'title' => 'Quiz - Ranking',
                'quizzes' => $quizzes,
                'pontuacoes' => $pontuacoes,
                'routeLogout' => route('logout')
            ];

        view('ranking', $data);
    }

    public function score()
    {

        $score = $this->pontuacao->getScore($_SESSION['usuario']);

        $data =
            [
                'title' => 'Quiz - Pontuações',
                'score' => $score,
                'routeLogout' => route('logout')
            ];

        view('score', $data);
    }
}
