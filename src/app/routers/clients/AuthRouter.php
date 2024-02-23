<?php

namespace App\src\app\routers\clients;

use App\src\app\routers\Router;
use App\src\app\controllers\clients\AuthController;

class AuthRouter
{
    public function __construct()
    {
        Router::get("/login", [AuthController::class, "login"]);
        Router::post("/login", [AuthController::class, "login"]);
        Router::get("/signIn", [AuthController::class, "signIn"]);
        Router::post("/signIn", [AuthController::class, "signIn"]);
        Router::get("/verifyAccount", [AuthController::class, "verifyAccount"]);
        Router::post("/verifyAccount", [AuthController::class, "verifyAccount"]);
    }
}
