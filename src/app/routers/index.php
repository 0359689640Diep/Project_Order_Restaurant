<?php

namespace App\app\routers;

use App\app\routers\HomeRouter;
use App\app\routers\AuthRouter;
use App\app\routers\ProductDetailsRouter;

class index
{
    public function __construct()
    {
        new HomeRouter;
        new AuthRouter;
        new ProductDetailsRouter;
    }
}
