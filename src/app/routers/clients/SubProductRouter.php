<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\SubProductController;

class SubProductRouter
{
    public function __construct()
    {
        Router::get("/getSubProduct", [SubProductController::class, "getAllSubProduct"]);
    }
}
