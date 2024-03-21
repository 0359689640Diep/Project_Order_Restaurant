<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\eat_online\PaymentMethodsController;


class MethodOnlineRouter
{
    public function __construct()
    {
        Router::get("/onlinePayment", [PaymentMethodsController::class, "getClientMethodOnline"]);
        Router::post("/onlinePayment", [PaymentMethodsController::class, "postClientMethodOnline"]);
    }
}
