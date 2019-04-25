<?php

namespace tbf\App\Models;



use tbf\App\Core\Model;

class Product extends Model
{
    const TABLE = 'products';

    public $id;
    public $title;
    public $cat;
    public $price;
    public $rus_name;
    public $img;
    public $descr;



}