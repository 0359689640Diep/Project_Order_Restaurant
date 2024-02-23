<?php

namespace App\src\app\routers\clients;

use App\src\app\routers\Router;
use App\src\app\controllers\clients\CategoryController;

class CategoryRouter
{
    public function __construct()
    {
        Router::get("/categorys", [CategoryController::class, "getProductByCategory"]);
        Router::post("/categorys", [CategoryController::class, "getProductByCategory"]);
    }
}
