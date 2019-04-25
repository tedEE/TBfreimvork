<?php

require '../vendor/autoload.php';
require_once '../components/helpers.php';
require_once '../config/const.php';


echo ROOT;

//const ROOT = __DIR__;
//const CONFIG = ROOT . '/config/';
//const TEMPLATE = ROOT . '/template/';

$router = new \tbf\App\Core\Router();
$router->run();





//$view = new \tbf\App\Core\View();

//$view->products = \tbf\App\Models\Product::findAll();
//$view->cats = \tbf\App\Models\Cats::findAll();
//$view->foo = '42';
//
//$view->display(ROOT. '/template/index.php');
//$ctrl = new \tbf\App\Controllers\IndexController();
//$ctrl->action();

//echo count($view);

//$i = 9;
//$i2 = 7;
//function sum($x,$y){
//    return $x+$y;
//}
//sum($i, $i2);
//$prod = new \tbf\App\Models\Product();
//$prod->price = 50;
//$prod->title = 'Криб';
//$prod->rus_name = 'Невкусный гриб';
//$prod->img = 'img';
//$prod->cat = 'poisonous';
//$prod->descr = "невкусныйгриб";
//$prod->insert();
//$prod->delete(31);
//$prod->update(32, 'title', 'Гриб');



