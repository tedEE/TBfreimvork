<?php


namespace tbf\App\Controllers;


use tbf\App\Core\Controller;
use tbf\App\Models\Product;

class IndexController extends Controller
{
    public function action()
    {
        $this->view->products = Product::findAll();
        echo $this->view->render(ROOT . '/template/index.php');
    }
}