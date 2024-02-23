<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\ProductController;

class ProductRouter
{
    public function __construct()
    {
        Router::get("/admin/product", [ProductController::class, "getDataProduct"]);
        Router::get("/admin/product/create", [ProductController::class, "getUIFromCreateProduct"]);
        Router::get("/admin/product/edit", [ProductController::class, "getFromEditProduct"]);
        Router::post("/admin/product/edit", [ProductController::class, "postFromEditProduct"]);
        Router::post("/admin/product/create", [ProductController::class, "postCreateProduct"]);
        Router::get("/admin/product/delete", [ProductController::class, "deleteProduct"]);
    }
}
