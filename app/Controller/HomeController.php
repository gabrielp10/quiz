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
        $quizzes = $this->questionario->all();

        $data = [
            "title" => "Quiz - Home",
            "routeQuiz" => route('quiz'),
            "quizzes" => $quizzes,
            "routeScore" => route('score'),
            "routeRanking" => route('ranking'),
            "routeLogout" =>  route('logout')

        ];
        
        return view('home', $data);
    }
}