<?php

namespace App\app\routers;

use App\app\routers\HomeRouter;
use App\app\routers\AuthRouter;
use App\app\routers\ProductDetailsRouter;
use App\app\routers\CartRouter;
use App\app\routers\SubProductRouter;
use App\app\routers\ChooseTableRouter;
use App\app\routers\MethodOnlineRouter;

class index
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
    }
}
