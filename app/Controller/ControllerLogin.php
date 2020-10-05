<?php

namespace App\Controller;

use Src\Route;
use Src\Request;

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
        $request = request()->all();
        var_dump($request);
    }
}