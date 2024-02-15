<?php

namespace App\app\routers\admin;

use App\app\routers\Router;
use App\app\controllers\admin\CategoryController;

class CategoryRouter
{
    public function __construct()
    {
        Router::get("/admin/category", [CategoryController::class, "getUIListCategory"]);
        Router::get("/admin/category/delete", [CategoryController::class, "deleteCategory"]);
        Router::get("/admin/category/edit", [CategoryController::class, "getUIEditCategory"]);
        Router::get("/admin/category/create", [CategoryController::class, "getUICreateCategory"]);
        Router::post("/admin/category/create", [CategoryController::class, "CreateCategory"]);
        Router::post("/admin/category/edit", [CategoryController::class, "postEditCategory"]);
    }
}