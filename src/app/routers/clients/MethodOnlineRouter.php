<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\PaymentMethodsController;


class MethodOnlineRouter
{
    public function __construct()
    {
        Router::get("/onlinePayment", [PaymentMethodsController::class, "getClientMethodOnline"]);
        Router::post("/onlinePayment", [PaymentMethodsController::class, "postClientMethodOnline"]);
    }
}
