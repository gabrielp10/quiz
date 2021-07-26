<?php
require __DIR__ . '/src/env/enviroment_variables.php';

if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require __DIR__ . '/vendor/autoload.php';

session_start();

try {

    require __DIR__ . '/routes/routes.php';
} catch (\Exception $e) {

    echo $e->getMessage();
}
