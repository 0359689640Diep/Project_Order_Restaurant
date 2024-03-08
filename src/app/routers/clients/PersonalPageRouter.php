<?php

namespace App\src\app\routers\clients;

use App\src\app\controllers\clients\PersonalPageController;
use App\src\app\routers\Router;

class PersonalPageRouter
{
    public function __construct()
    {
        Router::get("/personalpage", [PersonalPageController::class, "getUIPersonal"]);
        Router::post("/personalpage", [PersonalPageController::class, "updatePersonal"]);
        Router::get("/logout", [PersonalPageController::class, "deleteSection"]);
    }
}