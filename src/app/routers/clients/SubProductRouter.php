<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\SubProductController;

class SubProductRouter
{
    public function __construct()
    {
        Router::get("/getSubProduct", [SubProductController::class, "getAllSubProduct"]);
    }
}
