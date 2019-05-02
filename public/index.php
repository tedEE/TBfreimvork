<?php

require '../vendor/autoload.php';
require_once '../components/helpers.php';
require_once '../config/const.php';


$prod = new \tbf\App\Models\Product();

$data = [
    'title' => 'new dsfdfsdf'
];
$prod->rus_name = 'тестовый гриб';
//$prod->insert();
$prod->update( $data , ['id' => 38] );

//const ROOT = __DIR__;
//const CONFIG = ROOT . '/config/';
//const TEMPLATE = ROOT . '/template/';

//$router = new \tbf\App\Core\Router();
//$router->run();





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
//$sql = 'UPDATE `products` SET `title` = \'Grib\', `price` = \'5034\', `rus_name` = \' классный гриб\', `descr` = \'очень классный гриб\' WHERE `products`.`id` = 33';
//$prod->execSql($sql);
//$prod->price = 50;
//$prod->title = 'Криб';
//$prod->rus_name = 'тестовый гриб';
//$prod->img = 'img';
//$prod->cat = 'poisonous';
//$prod->descr = "невкусныйгриб";
//$prod->insert();
//$prod->delete(31);
//$prod->update(32, 'title', 'skjfhjasdhfjd');



