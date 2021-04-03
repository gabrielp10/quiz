<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Usuario;

class HomeController
{
    private $questionario;

    public function __construct()
    {
        $this->questionario = new \App\Model\Questionario();
    }

    public function index() 
    {

        if($_SESSION['tipo_usuario'] !== '1')
        {
            $adpanel = '';
        } else {
            $adpanel = route('adpanel');
        }

        $quizzes = $this->questionario->all();

        $data = [
            "title" => "Quiz - Home",
            "routeQuiz" => route('quiz'),
            "quizzes" => $quizzes,
            "routeScore" => route('score'),
            "routeRanking" => route('ranking'),
            "routeAdPanel" => $adpanel,
            "routeLogout" =>  route('logout')

        ];
        
        return view('home', $data);
    }

    public function checkUser()
    {
        print_r($_SESSION());
    }
}