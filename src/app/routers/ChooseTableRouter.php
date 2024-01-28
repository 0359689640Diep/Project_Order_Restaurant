<?php

namespace App\app\routers;

use App\app\routers\Router;
use App\app\controllers\ChooseTableController;

class ChooseTableRouter
{
    public function __construct()
    {
        Router::get("/chooseTable", [ChooseTableController::class, "getTales"]);
        Router::post("/chooseTable", [ChooseTableController::class, "postTales"]);
    }
}
