<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\SubProductController;

class SubProductRouter
{
    public function __construct()
    {
        Router::get("/admin/subproduct", [SubProductController::class, "getDataProduct"]);
        Router::get("/admin/subproduct/create", [SubProductController::class, "getUIFromCreateProduct"]);
        Router::get("/admin/subproduct/edit", [SubProductController::class, "getFromEditProduct"]);
        Router::post("/admin/subproduct/edit", [SubProductController::class, "postFromEditProduct"]);
        Router::post("/admin/subproduct/create", [SubProductController::class, "postCreateProduct"]);
        Router::get("/admin/subproduct/delete", [SubProductController::class, "deleteProduct"]);
    }
}
