<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\HomeController;

class HomeRouter
{
    public function __construct()
    {
        Router::get('/', [HomeController::class, "index"]);
    }
}
