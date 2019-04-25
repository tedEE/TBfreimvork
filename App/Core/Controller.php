<?php


namespace tbf\App\Core;


abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }
    public function __invoke()
    {

    }

}