<?php

namespace App\app\routers;

use App\app\routers\Router;
use App\app\controllers\SubProductController;

class SubProductRouter
{
    public function __construct()
    {
        Router::get("/getSubProduct", [SubProductController::class, "getAllSubProduct"]);
    }
}
