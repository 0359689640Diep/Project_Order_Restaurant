<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
    }
    public function getDataHomeAdmin()
    {
        $this->loadView("admin/Home.php");
    }
}
