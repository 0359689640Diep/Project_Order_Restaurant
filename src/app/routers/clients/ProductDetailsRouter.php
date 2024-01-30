<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\ProductDetails;

class ProductDetailsRouter
{
    public function __construct()
    {
        Router::get("/productDetails", [ProductDetails::class, "index"]);
        Router::post("/productDetails", [ProductDetails::class, "eventHandling"]);
    }
}
