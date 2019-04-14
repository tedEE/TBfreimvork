<?php

namespace tbf\components;

class Router
{

    private $routes = [
        'news/([a-z]+)/([0-9]+)' => 'news/$1/$2',
//        'news' => 'news/index',
//        'products' => 'product/list'
    ];

    public function __construct()
    {

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

        foreach ($this->routes as $uriPattern => $path){

            if (preg_match("~$uriPattern~", $uri)){//проверка есть ли такой роут в масиве роутов


                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);//создание массива контроллер=>актион из запроса

                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst((array_shift($segments)));
                $params = $segments;
                echo $actionName . "<br>";
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