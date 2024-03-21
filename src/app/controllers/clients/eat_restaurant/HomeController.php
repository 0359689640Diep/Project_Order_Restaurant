<?php

namespace App\src\app\controllers\clients\eat_restaurant;

use App\src\app\controllers\BaseController;
use App\src\app\models\TablesModels;

class HomeController extends BaseController
{

    private $TablesModels;

    public function __construct()
    {
        $this->TablesModels = new TablesModels;
    }

    public function Home()
    {
        $this->data = ["dataTables" => $this->TablesModels->getAllTables("StatusTable", 1)];
        return $this->loadView("", $this->data);
    }
}
