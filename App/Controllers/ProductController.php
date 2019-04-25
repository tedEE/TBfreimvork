<?php


namespace tbf\App\Controllers;


use tbf\App\Core\Controller;
use tbf\App\Models\Product;

class ProductController extends Controller
{
    public function actionIndex($id)
    {
        $id = array_shift($id);
//        var_dump($id);
        $this->view->product = Product::findById($id);
//        xprint($this->view);
        $this->view->render(TEMPLATE . 'product.php');
        $this->view->display(TEMPLATE . 'product.php');
    }
//    public function __invoke()
//    {
//        echo 'i am product';
//    }
}