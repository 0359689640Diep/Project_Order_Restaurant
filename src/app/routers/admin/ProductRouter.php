<?php

namespace App\app\routers\admin;

use App\app\routers\Router;
use App\app\controllers\admin\ProductController;

class ProductRouter
{
    public function __construct()
    {
        Router::get("/admin/product", [ProductController::class, "getDataProduct"]);
    }
}
