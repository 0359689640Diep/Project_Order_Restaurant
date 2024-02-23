<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\ProductDetails;

class ProductDetailsRouter
{
    public function __construct()
    {
        Router::get("/productDetails", [ProductDetails::class, "index"]);
        Router::post("/productDetails", [ProductDetails::class, "eventHandling"]);
    }
}
