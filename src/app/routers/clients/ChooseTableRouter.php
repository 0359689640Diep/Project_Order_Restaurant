<?php

namespace App\app\routers\clients;


use App\app\routers\Router;
use App\app\controllers\clients\ChooseTableController;

class ChooseTableRouter
{
    public function __construct()
    {
        Router::get("/chooseTable", [ChooseTableController::class, "getTales"]);
        Router::post("/chooseTable", [ChooseTableController::class, "postTales"]);
    }
}
