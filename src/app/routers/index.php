<?php

namespace App\src\app\routers;

use App\src\app\routers\clients\HomeRouter;
use App\src\app\routers\clients\AuthRouter;
use App\src\app\routers\clients\ProductDetailsRouter;
use App\src\app\routers\clients\CartRouter;
use App\src\app\routers\clients\SubProductRouter;
use App\src\app\routers\clients\ChooseTableRouter;
use App\src\app\routers\clients\MethodOnlineRouter;
use App\src\app\routers\clients\CategoryRouter;

use App\src\app\routers\admin\HomeRouter as AdminHomeRouter;
use App\src\app\routers\admin\ProductRouter;
use App\src\app\routers\admin\SubProductRouter as AdminSubProductRouter;
use App\src\app\routers\admin\AccountRouter;
use App\src\app\routers\admin\TableRouter;
use App\src\app\routers\admin\CategoryRouter as AdminCategoryRouter;
use App\src\app\routers\admin\SizeRouter;
use App\src\app\routers\admin\CommentRouter;
use App\src\app\routers\clients\BillRouter;

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
        new AdminCategoryRouter;
        new SizeRouter;
        new CommentRouter;
        new BillRouter;
    }
}
