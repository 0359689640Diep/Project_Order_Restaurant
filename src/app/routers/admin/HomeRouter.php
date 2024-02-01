<?php

namespace App\app\routers\admin;

use App\app\routers\Router;
use App\app\controllers\admin\HomeController;

class HomeRouter
{
    public function __construct()
    {
        Router::get("/admin", [HomeController::class, "getDataHomeAdmin"]);
    }
}
