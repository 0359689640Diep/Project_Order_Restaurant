<?php

namespace App\src\app\controllers\clients;

use App\src\app\models\CategoryModels;
use App\src\app\models\ChooseTableModels;
use App\src\app\controllers\BaseController;



class ChooseTableController extends BaseController
{
    private  $modelCategory, $modelChooseTable;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelChooseTable = new ChooseTableModels;
    }
    public function getTales()
    {
        $this->data = [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "dataTables" => $this->modelChooseTable->getAllTables(),
            "maxNumberPeopleDefault" => $this->modelChooseTable->getMaxNumberPeopleDefault()
        ];
        $this->loadView("clients/ChooseTable.php", $this->data);
    }
    public function postTales()
    {
        return $this->nextPage("dataTables", $_POST, "onlinePayment");
    }
}
