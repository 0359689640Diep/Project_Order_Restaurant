<?php

namespace App\app\routers;

use App\app\routers\Router;
use App\app\controllers\AuthController;

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
