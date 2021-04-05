<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Usuario;

class AdminController

{
    public function check()
    {
        $data = 
        [
            'title' => 'Quiz - Painel Administrativo',
            'routeNewQuiz' => route('newQuiz'),
            'routeEditQuiz' => route('editQuiz'),
            'routeDeleteQuiz' => route('deleteQuiz'),
            'routeLogout' => route('logout')

        ];

        view('adpanel', $data);
    }

    public function newQuiz(){
        $data = 
        [
            'title' => 'Criar Quiz'
        ];

        view('newQuiz', $data);
    }

    public function editQuiz(){
        $data = 
        [
            'title' => 'Editar Quiz'
        ];

        view('editQuiz', $data);
    }

    public function deleteQuiz(){
        $data = 
        [
            'title' => 'Deletar Quiz'
        ];
        view('deleteQuiz', $data);
    }
}