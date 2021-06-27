<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Questionario;
use App\Model\AcessoQuestionario;
use App\Model\Categoria;

class HomeController
{
    private $questionario;
    private $acessoQuestionario;
    private $categoria;

    public function __construct()
    {
        $this->questionario = new Questionario();
        $this->acessoQuestionario = new AcessoQuestionario();
        $this->categoria = new Categoria;
    }

    public function index()
    {
        if (!isset($_SESSION['id'])){
          return redirect(route('login'));
        }
        
        $idQuestionarioAberto = $this->acessoQuestionario->getQuestionarioAberto($_SESSION['id']);
        $categorias = $this->categoria->all();

        foreach ($categorias as $categoria){
          $quizzes[] = $this->categoria->getQuizPorCategoria($categoria['id']);
        }

        $data = [
            "title" => "Quiz - Home",
            "routeQuiz" => route('quiz'),
            "routeDashQuiz" => route('dashQuiz'),
            "quizzes" => $quizzes,
            "idQuestionarioAberto" => $idQuestionarioAberto,
            "categorias" => $categorias,
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
}
