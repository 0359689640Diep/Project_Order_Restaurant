<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\CategoryModels;
use App\src\app\models\OderModels;

class BillController extends BaseController
{
    private $modelOrder, $modelCategory;
    public function __construct()
    {
        $this->modelOrder = new OderModels;
        $this->modelCategory = new CategoryModels;
        $this->authentication("KH");
    }
    public function getUIBill()
    {
        $dataAccount = $this->authentication("KH");
        $this->data += [
            "dataBill" => $this->modelOrder->getALLOrderByIdAccount($dataAccount["IdAccount"]),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
        ];
        return $this->loadView("clients/Bill.php", $this->data);
    }

    public function getUIDetailsBill()
    {
        $id = $this->checkParam("id", "404");
        $this->data += [
            "dataDetailsBill" => $this->modelOrder->findOrder("IdOrder", $id, "suborders"),
        ];
        return $this->loadView("clients/DetailsBill.php", $this->data);
    }
}