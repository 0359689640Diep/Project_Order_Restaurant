<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\eat_online\HomeController;

class HomeRouter
{
    public function __construct()
    {
        Router::get('/', [HomeController::class, "index"]);
        Router::post("/bookingtable", [HomeController::class, "bookingTable"]);
    }
}
