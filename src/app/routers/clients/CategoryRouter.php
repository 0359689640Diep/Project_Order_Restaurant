<?php

namespace App\app\routers\clients;

use App\app\routers\Router;
use App\app\controllers\clients\CategoryController;

class CategoryRouter
{
    public function __construct()
    {
        Router::get("/categorys", [CategoryController::class, "getProductByCategory"]);
        Router::post("/categorys", [CategoryController::class, "getProductByCategory"]);
    }
}
