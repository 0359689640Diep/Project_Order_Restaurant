<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\eat_online\CartController;

class CartRouter
{
    public function __construct()
    {
        Router::get("/cart", [CartController::class, "getProduct"]);
        Router::post("/cart", [CartController::class, "postProduct"]);
    }
}
