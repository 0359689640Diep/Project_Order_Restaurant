<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\BillController;

class BillRouter
{
    public function __construct()
    {
        Router::get("/bill", [BillController::class, "getUIBill"]);
        Router::get("/billdetails", [BillController::class, "getUIDetailsBill"]);
    }
}
