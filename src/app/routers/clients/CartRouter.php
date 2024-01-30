<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\CartController;

class CartRouter
{
    public function __construct()
    {
        Router::get("/cart", [CartController::class, "getProduct"]);
        Router::post("/cart", [CartController::class, "postProduct"]);
    }
}
