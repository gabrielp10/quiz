<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Questionario;
use App\Model\AcessoQuestionario;

class HomeController
{
    private $questionario;
    private $acessoQuestionario;

    public function __construct()
    {
        $this->questionario = new Questionario();
        $this->acessoQuestionario = new AcessoQuestionario();
    }

    public function index()
    {
        if (!isset($_SESSION['id'])){
          return redirect(route('login'));
        }
        
        $quizzes = $this->questionario->all();
        $idQuestionarioAberto = $this->acessoQuestionario->getQuestionarioAberto($_SESSION['id']);

        $data = [
            "title" => "Quiz - Home",
            "routeQuiz" => route('quiz'),
            "quizzes" => $quizzes,
            "idQuestionarioAberto" => $idQuestionarioAberto,
            "routeScore" => route('score'),
            "routeRanking" => route('ranking'),
            "routeLogout" =>  route('logout')

        ];

        if ($_SESSION['tipo_usuario'] == '1') {
            $adpanel = route('adpanel');
            $data["routeAdPanel"] = $adpanel;
        }

        return view('home', $data);
    }

    public function checkUser()
    {
        print_r($_SESSION());
    }
}
