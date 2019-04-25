<?php


namespace tbf\App\Core;


class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require CONFIG . 'routes.php';
        foreach ($arr as $key => $value){
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        xprint($url);
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match()){
//            echo '<p>Controller : ' . $this->params['controller'] .'</p>';
//            echo '<p>Action : ' . $this->params['action'] .'</p>';
            $controller = '\tbf\App\Controllers\\' . ucfirst($this->params['controller']);
//            echo $controller;
            if (class_exists($controller)){
                $action = $this->params['action'];
                $controller = new $controller;
                $controller->$action();
            }

        }
    }
}