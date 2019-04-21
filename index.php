<?php

require './vendor/autoload.php';

const ROOT = __DIR__;

$router = new \tbf\components\Router();
$router->run();


$view = new \tbf\App\View();

$view->products = \tbf\App\Models\Product::findAll() ;
$view->display(ROOT. '/template/index.php');
$view->foo = 'bar';
$view->bax = 42;
$view->test = 5;

echo count($view);

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



