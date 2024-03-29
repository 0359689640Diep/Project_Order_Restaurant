<?php

namespace App\src\app\routers\admin;

use App\src\app\controllers\admin\TablesController;
use App\src\app\routers\Router;

class TableRouter
{
    public function __construct()
    {
        Router::get('/admin/table', [TablesController::class, "getUIListTable"]);
        Router::get('/admin/table/delete', [TablesController::class, "deleteTable"]);
        Router::get('/admin/table/edit', [TablesController::class, "getUIEditTable"]);
        Router::get('/admin/table/create', [TablesController::class, "getUICreateTable"]);
        Router::post('/admin/table/create', [TablesController::class, "postCreateTable"]);
        Router::post('/admin/table/edit', [TablesController::class, "postEidtTable"]);
    }
}
