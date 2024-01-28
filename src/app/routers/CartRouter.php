<?php

namespace App\app\routers;

use App\app\routers\Router;
use App\app\controllers\CartController;

class CartRouter
{
    public function __construct()
    {
        Router::get("/cart", [CartController::class, "getProduct"]);
        Router::post("/cart", [CartController::class, "postProduct"]);
    }
}
