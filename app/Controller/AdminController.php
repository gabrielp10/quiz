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
            'routeLogout' => route('logout')
        ];

        view('adpanel', $data);
    }
}