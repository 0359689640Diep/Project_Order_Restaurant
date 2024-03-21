<?php

namespace App\src\app\routers\clients;


use App\src\app\routers\Router;
use App\src\app\controllers\clients\eat_online\ChooseTableController;

class ChooseTableRouter
{
    public function __construct()
    {
        Router::get("/chooseTable", [ChooseTableController::class, "getTales"]);
        Router::post("/chooseTable", [ChooseTableController::class, "postTales"]);
    }
}
