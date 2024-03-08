<?php

namespace App\src\app\routers;

use App\src\app\routers\clients\ClientRouter;
use App\src\app\routers\admin\AdminRouter;


class index
{
    public function __construct()
    {
        new ClientRouter;
        new AdminRouter;
    }
}
