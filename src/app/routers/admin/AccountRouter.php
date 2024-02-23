<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\AccountController;

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
