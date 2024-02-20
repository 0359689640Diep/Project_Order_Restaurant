<?php

namespace App\app\routers\admin;

use App\app\routers\Router;
use App\app\controllers\admin\AccountController;

class AccountRouter
{
    public function __construct()
    {
        Router::get("/admin/account", [AccountController::class, "getAllAccount"]);
        Router::get("/admin/account/delete", [AccountController::class, "deleteAccount"]);
        Router::get("/admin/account/edit", [AccountController::class, "editAccount"]);
        Router::post("/admin/account/edit", [AccountController::class, "postFromEditAccount"]);
        Router::get("/admin/account/create", [AccountController::class, "getUICreateAccount"]);
        Router::post("/admin/account/create", [AccountController::class, "postCreateAccount"]);
    }
}
