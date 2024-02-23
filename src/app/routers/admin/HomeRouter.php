<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\HomeController;

class HomeRouter
{
    public function __construct()
    {
        Router::get("/admin", [HomeController::class, "getDataHomeAdmin"]);
    }
}
