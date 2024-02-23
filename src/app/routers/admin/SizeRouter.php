<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\SizeController;

class SizeRouter
{
    public function __construct()
    {
        Router::get("/admin/size", [SizeController::class, "getUIListSize"]);
        Router::get("/admin/size/edit", [SizeController::class, "getUIEditSize"]);
        Router::post("/admin/size/edit", [SizeController::class, "postEditSize"]);
        Router::get("/admin/size/delete", [SizeController::class, "deleteSize"]);
        Router::get("/admin/size/deleteSizeInProduct", [SizeController::class, "deleteSizeInProduct"]);
        Router::get("/admin/size/create", [SizeController::class, "getUICreateSize"]);
        Router::post("/admin/size/create", [SizeController::class, "postCreateSize"]);
        Router::get("/admin/size/addProduct", [SizeController::class, "getUIAddProduct"]);
        Router::get("/admin/size/addSizeInProduct", [SizeController::class, "getUIAddSizeInProduct"]);
        Router::post("/admin/size/addSizeInProduct", [SizeController::class, "postSizeInProduct"]);
    }
}
