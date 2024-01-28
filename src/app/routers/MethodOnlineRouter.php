<?php

namespace App\app\routers;

use App\app\controllers\PaymentMethodsController;
use App\app\routers\Router;


class MethodOnlineRouter
{
    public function __construct()
    {
        Router::get("/paymentMethodOnline", [PaymentMethodsController::class, "getClientMethodOnline"]);
        Router::post("/paymentMethods", [PaymentMethodsController::class, "postClientMethodOnline"]);
    }
}
