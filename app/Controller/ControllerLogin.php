<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Usuario;

class ControllerLogin
{
    public function index() 
    {
        $data = [
            "title" => "Quiz - Linux",
            "routeLogin" => route('login'),
            "routeRegister" => route('register')
        ];

        view('login', $data);
    }

    public function store() 
    {

        // Exemplo de cadastro
        $request = request()->all();

        $usuario = new Usuario();
        echo $usuario->all()."<br />";

        echo $usuario->save(
            [
                'username' => $request['usuario'],
                'password' => $request['senha'],
                'email' => null
            ]
        );
        
        die();
        var_dump($request);
    }
}