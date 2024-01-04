<?php

namespace App\app\controllers;

use App\app\controllers\BaseController;
use App\app\Models\HomeModel;


class HomeController extends BaseController
{
    use HomeModel;

    public $data = [];
    
    public function index()
    {
        $this->data = [ 
            "Product" => $this->getProduct(),
            "getNewTwoProduct" => $this->getNewTwoProduct(), 
            "Category" => $this->getCategory(),
            "Tables" => $this ->getTables(),
            "MaxNumberPeopleTables" => $this ->getMaxNumberPeopleTables(),
        ];
        $this->loadView("Home.php", $this->data);
    }
}