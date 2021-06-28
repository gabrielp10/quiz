<?php

use Src\Route as Route;
 
Route::get(['set' => '/', 'as' => 'home'], 'HomeController@index');
 
Route::get(['set' => '/login', 'as' => 'login'], 'LoginController@index');

Route::post(['set' => '/login', 'as' => 'login'], 'LoginController@login');

Route::post(['set' => '/cadastro', 'as' => 'register'], 'LoginController@store');

Route::get(['set' => '/questionario/{id}', 'as' => 'quiz'], 'QuizController@quiz');

Route::post(['set' => '/validar-questionario', 'as' => 'validate'], 'QuizController@check');

Route::get(['set' => '/ranking-geral', 'as' => 'ranking'], 'QuizController@ranking');

Route::get(['set' => '/logout', 'as' => 'logout'], 'LoginController@logout');

Route::get(['set' => '/painel-administrativo', 'as' => 'adpanel'], 'AdminController@check');

Route::get(['set' => '/pontuacoes', 'as' => 'score'], 'QuizController@score');

Route::get(['set' => '/novo-quiz', 'as' => 'newQuiz'], 'AdminController@newQuiz');

Route::get(['set' => '/editar-quiz', 'as' => 'editQuiz'], 'AdminController@editQuiz');

Route::get(['set' => '/deletar-quiz', 'as' => 'deleteQuiz'], 'AdminController@deleteQuiz');

Route::get(['set' => '/dash-quiz/{id}', 'as' => 'dashQuiz'], 'QuizController@dashQuiz');


