<?php

namespace tbf\App\Controllers;


use tbf\App\Core\Controller;

class MainController extends Controller
{

    public function ActionIndex()
    {
        $this->view->products = \tbf\App\Models\Product::findAll();
        $this->view->cats = \tbf\App\Models\Cats::findAll();
        $this->view->render(TEMPLATE . 'index.php');
        $this->view->display(ROOT. '/template/index.php');
    }
}