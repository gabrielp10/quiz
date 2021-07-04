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
            "title" => "Quiz - Login",
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
                'password' => password_hash($request['senha'], PASSWORD_DEFAULT),
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

        $userExist = $usuario->checkLogin($request['usuario'], $request['id'], $request['tipo_usuario']);

        if (!$userExist || !password_verify($request['senha'], $userExist->password)) {
            $data = "Usuário ou senha inválidos.";

            message('login', $data);
            return redirect(route('login'));
        }

        $_SESSION['usuario'] = $userExist->username;
        $_SESSION['tipo_usuario'] = $userExist->type_user;
        $_SESSION['id'] = $userExist->id;


        return redirect('/');
    }

    public function logout()
    {
        session_destroy();
        redirect(route('login'));
    }
}