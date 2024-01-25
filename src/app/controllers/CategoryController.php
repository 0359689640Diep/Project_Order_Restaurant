<?php

namespace App\app\controllers;

use App\app\models\CategoryModels;

class CategoryController
{
    public $modelCategory;
    public $data = [];

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
    }

    public function getAllCategory()
    {
        $this->data = ["Category" => $this->modelCategory->getCategory()];
        return $this->data;
    }
}
