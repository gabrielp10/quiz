<?php

use Src\Route as Route;
 
Route::get(['set' => '/login', 'as' => 'login'], 'ControllerLogin@index');

Route::post(['set' => '/cadastro', 'as' => 'register'], 'ControllerLogin@store');
 
Route::get('/teste/{teste}', function($teste){
 
    echo "Agora foi recebido da URI o parâmetro: " . $teste;
 
});

Route::get('/produto/{produto}/categoria/{categoria}/editar', function($produto, $categoria){
 
    echo "Recebeu => produto: " . $produto . "<br />";
    echo "Recebeu => categoria: " . $categoria . "<br />";
 
});

Route::get(['set' => '/cliente/{cliente_id}', 'as' => 'clientes.edit'], function($cliente_id){
 
    echo "Cliente => " . $cliente_id;
 
});

Route::get('/teste2', function() use($router){
 
    echo '<a href="' . Route::translate('clientes.edit', 1) . '">Clique aqui para testar a rota clientes.edit</a>';
 
});

Route::get('/contatos/store', "Controller@store");