<?php

namespace App\app\routers;

use App\app\routers\clients\HomeRouter;
use App\app\routers\clients\AuthRouter;
use App\app\routers\clients\ProductDetailsRouter;
use App\app\routers\clients\CartRouter;
use App\app\routers\clients\SubProductRouter;
use App\app\routers\clients\ChooseTableRouter;
use App\app\routers\clients\MethodOnlineRouter;
use App\app\routers\clients\CategoryRouter;

use App\app\routers\admin\HomeRouter as AdminHomeRouter;
use App\app\routers\admin\ProductRouter;
use App\app\routers\admin\SubProductRouter as AdminSubProductRouter;
use App\app\routers\admin\AccountRouter;
use App\app\routers\admin\TableRouter;

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
        new CategoryRouter;

        new AdminHomeRouter;
        new ProductRouter;
        new AdminSubProductRouter;
        new AccountRouter;
        new TableRouter;
    }
}
