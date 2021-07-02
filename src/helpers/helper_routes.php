<?php
 
use Src\Route;
use Src\Request;
 
function request()
{
    return new Request;
}

function response($jsonResponse, $httpCode = 200)
{
    // header("HTTP/1.1 $httpCode");
    return json_encode($jsonResponse);
}


function resolve($request = null)
{
    if(is_null($request)) {
        $request = request();
    }
    return Route::resolve($request);        
}

function route($name, $params = null)
{
    return Route::translate($name, $params);
}

function redirect($route)
{
    header("Location: $route");
}

function view($file, $data)
{   
    require __DIR__ ."/../../public/navbar.php";
    require __DIR__ ."/../../public/$file.php";
    require __DIR__ ."/../../public/footer.php";
} 

function back()
{
    return header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function message($field, $message, $type = 'danger')
{
    $_SESSION['message'][$field] = $message;
    $_SESSION['message']['type'] = $type;
}

function getMessage($field)
{
    $message = null;
    if (isset($_SESSION['message'][$field])) {
        $message['text'] = $_SESSION['message'][$field];
        $message['type'] = $_SESSION['message']['type'];
        unset($_SESSION['message'][$field]);
        unset($_SESSION['message']['type']);
    }

    return $message;
}