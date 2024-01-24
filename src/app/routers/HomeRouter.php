<?php

namespace App\app\routers;

use App\app\routers\Router;
use App\app\controllers\HomeController;

class HomeRouter
{
    public function __construct()
    {
        Router::get('/', [HomeController::class, "index"]);
    }
}
