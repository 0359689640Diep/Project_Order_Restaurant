<?php

namespace App\src\app\routers\clients;

use App\src\app\controllers\clients\CommentController;
use App\src\app\routers\Router;

class CommentRouter
{
    public function __construct()
    {
        Router::get("/comment", [CommentController::class, "getUIListComment"]);
        Router::post("/comment", [CommentController::class, "updateComment"]);
    }
}
