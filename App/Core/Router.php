<?php

namespace tbf\App\Core;

class Router
{

    private $routes = [];

    public function __construct()
    {
        $this->routes = require CONFIG . 'routes.php';
    }



    /**
     * получение строки запроса
     */
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
//            return trim($_SERVER['REQUEST_URI'], '/');
            return substr($_SERVER['REQUEST_URI'], strlen('/'));

        }
    }

    public function run()
    {
        $uri = $this->getUri();
//        var_dump($uri);

        foreach ($this->routes as $uriPattern => $path){
//            xprint($uriPattern);
//            xprint($path);
            //проверка есть ли такой роут в масиве роутов
            if (preg_match("~$uriPattern~", $uri)){


                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //создание массива контроллер=>актион из запроса
                $segments = explode('/', $internalRoute);
//                xprint($segments, "массив segments");

                $controllerName = ucfirst(array_shift($segments).'Controller');
//                xprint($controllerName , 'controllerName');
                $actionName = 'action'.ucfirst((array_shift($segments)));
//                xprint($actionName , 'actionName');
                $params = $segments;
//                xprint($params, 'params');
//                echo $actionName . "<br>";
//                echo $controllerName . "<br>";
//                var_dump($params);
                $controllerClass = '\\tbf'.'\\App\\Controllers\\' .$controllerName;
//                var_dump($controllerClass);

                if (class_exists($controllerClass)){

                    $controller = new $controllerClass;
                    $controller->$actionName($params);

                }

             }
        }


    }
}