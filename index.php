<?php

// главный контроллер 

// настройки 


//подключение файлов 
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/component/Router.php');
require_once (ROOT.'/component/Db.php');


//соединение с Бд

//вызов роутера
$router = new Router();
$router->run();