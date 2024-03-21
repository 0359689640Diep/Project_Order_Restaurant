<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\eat_online\SubProductController;

class SubProductRouter
{
    public function __construct()
    {
        Router::get("/getSubProduct", [SubProductController::class, "getAllSubProduct"]);
    }
}
