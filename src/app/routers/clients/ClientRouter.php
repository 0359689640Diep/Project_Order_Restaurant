<?php

namespace App\src\app\routers\clients;

class ClientRouter
{
    public function __construct()
    {
        new HomeRouter;
        new AuthRouter;
        new ProductDetailsRouter;
        new CartRouter;
        new SubProductRouter;
        new ChooseTableRouter;
        new MethodOnlineRouter;
        new CategoryRouter;
        new BillRouter;
        new PersonalPageRouter;
        new CommentRouter;
    }
}
