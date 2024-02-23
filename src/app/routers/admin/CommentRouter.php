<?php

namespace App\src\app\routers\admin;

use App\src\app\controllers\admin\CommentController;
use App\src\app\routers\Router;

class CommentRouter
{
    public function __construct()
    {
        Router::get("/admin/comment", [CommentController::class, "getUIListComment"]);
        Router::get("/admin/comment/delete", [CommentController::class, "deleteComment"]);
        Router::get("/admin/comment/restore", [CommentController::class, "restoreComment"]);
    }
}
