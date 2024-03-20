<?php

namespace App\src\app\routers\admin;

use App\src\app\routers\Router;
use App\src\app\controllers\admin\OderController;


class OrderRouter
{
    public function __construct()
    {
        Router::get("/admin/order", [OderController::class, "getUiListOrder"]);
        Router::get("/admin/order/orderDetails", [OderController::class, "getUiListOrderDetails"]);
    }
}