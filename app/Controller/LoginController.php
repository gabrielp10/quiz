<?php

namespace App\Controller;

use Src\Route;
use Src\Request;
use App\Model\Usuario;

class LoginController
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
        $request = request()->all();

        if (empty($request['usuario']) || empty($request['senha'])) {
            $data = "Campos obrigatórios não foram enviados.";

            message('login', $data);
            return redirect(route('login'));
        }

        $usuario = new Usuario();

        $userExist = $usuario->getUserByName($request['usuario']);

        if ($userExist->totalUser > 0) {
            $data = "Username já cadastrado em nossa base.";

            message('login', $data);
            return redirect(route('login'));
        }

        $save = $usuario->save(
            [
                'username' => $request['usuario'],
                'password' => $request['senha'],
                'email' => null
            ]
        );

        if ($save) {
            $data = "Usuário criado com sucesso!";

            message('login', $data, 'success');

            return redirect(route('login'));
        }

        $data = "Falha ao criar usuário.";

        message('login', $data);

        return redirect(route('login'));
    }

    public function login() 
    {
        $request = request()->all();

        if (empty($request['usuario']) || empty($request['senha'])) {
            $data = "Campos obrigatórios não foram enviados.";

            message('login', $data);
            return redirect(route('login'));
        }

        $usuario = new Usuario();

        $userExist = $usuario->checkLogin($request['usuario'], $request['senha'], $request['id']);

        if (!$userExist) {
            $data = "Usuário inválido.";

            message('login', $data);
            return redirect(route('login'));
        }

        $_SESSION['usuario'] = $userExist->username;
        $_SESSION['id'] = $userExist->id;


        return redirect('/');
    }

    public function logout()
    {
        session_destroy();
        redirect(route('login'));
    }
}