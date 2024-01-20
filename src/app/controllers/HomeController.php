<?php

namespace App\app\controllers;

use App\app\controllers\BaseController;
use App\app\Models\ProductModel;
use App\app\Models\CategoryModels;
use App\app\Models\TablesModels;


class HomeController extends BaseController
{
    private $modelProduct;
    private $modelTables;
    private $modelCategory;
    public $data = [];

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelCategory = new CategoryModels;
        $this->modelTables = new TablesModels;
    }

    public function index()
    {
        $this->data = [
            "Product" => $this->modelProduct->getProduct(),
            "getNewTwoProduct" => $this->modelProduct->getNewProduct(2),
            "Category" => $this->modelCategory->getCategory(),
            "Tables" => $this->modelTables->getTables(),
            "MaxNumberPeopleTables" => $this->modelTables->getMaxNumberPeopleTables(),
        ];
        $this->loadView("Home.php", $this->data);
    }
}
