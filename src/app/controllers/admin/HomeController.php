<?php

namespace App\src\app\controllers\admin;

use App\src\app\controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication("admin");
    }

    private function checkAuthentication($type)
    {
        $this->authentication($type); // Kiểm tra đăng nhập
    }
    public function getDataHomeAdmin()
    {
        $this->loadView("admin/Home.php");
    }
}
