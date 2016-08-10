<?php

class Router {
    
    private $routes;
    
    public function __construct() {
        $routhesPath = ROOT.'/config/routes.php';
        $this->routes = include($routhesPath);
    }
    /**
     * @return возвращает строку запроса для дальнейшей обработки  
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run() {  
    // Получить строку запроса 
       $uri = $this->getUri();
    // проверить routher на наличие запроса 
    foreach ($this->routes as $uriPattern => $path) {
  
        // сравниваю URL роута с URL который пришел 
        if (preg_match("~$uriPattern~", $uri)) {
            // получаю параметры с внешнего пути 
            $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
            
            // с помощью explode разбиваю строку запроса на  массив 
            // чтобы получить контроллер и экшен и параметры
            
            $segments = explode('/', $internalRoute);
            
            $controllerName = array_shift($segments).'Controller';
            $actionName = 'action'.ucfirst(array_shift($segments));
            
            // после чего если в массиве остались параметры мы их так же присвоим
            
            $parameters = $segments; // тут массив параметров 
            //
            //подключаю контроллер 
            $controllerFile = require_once(ROOT.'/controlers/'.$controllerName.'.php');
            
            if(file_exists($controllerFile)) {
                include_once($controllerFile);
            }
            
            $controller = new $controllerName();
//            $result = $controller->$actionName($parameters);
            //call_user_func_array необходим для того чтобы в контроллере можно
           // было обращаться по "именам" к переменным
            $result = call_user_func_array(array($controller, $actionName), $parameters);
            
            // если нашли нужный контроллер и экшен то обрываем цикл 
            if($result != null){
                break; 
            } else {
                // тут не мешало б сделать 404 ошибку на худой конец, в 
                // лучшем виде так обработчик try catch
            }

        }
        
    }
    }
    
}