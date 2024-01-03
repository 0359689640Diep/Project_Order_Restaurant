<?php

namespace App\app\controllers;

use App\app\controllers\BaseController;
use App\app\Models\HomeModel;


class HomeController extends BaseController
{
    use HomeModel;
    public function index()
    {
        $this->loadView("Home.php", $this->getProduct());
    }
}
