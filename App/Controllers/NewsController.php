<?php


namespace tbf\App\Controllers;


class NewsController
{
//    public function __invoke()
//    {
//        echo 'i am news';
//    }

    public function actionIndex($params)
    {
        echo 'параметры переданные в action <br>';
        var_dump($params);
    }
}