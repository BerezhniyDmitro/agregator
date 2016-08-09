<?php

// главный контроллер 

// настройки 
ini_set(display_errors, 1);
error_reporting(E_ALL);

//подключение файлов 
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/component/Router.php');
require_once (ROOT.'/component/Db.php');


//соединение с Бд

//вызов роутера
$router = new Router();
$router->run();