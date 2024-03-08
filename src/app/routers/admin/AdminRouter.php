<?php

namespace App\src\app\routers\admin;

class AdminRouter
{
    public function __construct()
    {
        new HomeRouter;
        new ProductRouter;
        new SubProductRouter;
        new AccountRouter;
        new TableRouter;
        new CategoryRouter;
        new SizeRouter;
        new CommentRouter;
    }
}
