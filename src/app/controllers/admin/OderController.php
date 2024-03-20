<?php

namespace App\src\app\controllers\admin;

use App\src\app\controllers\BaseController;
use App\src\app\models\OderModels;

class OderController extends BaseController
{

    private $modelOrder;

    public function __construct()
    {
        $this->modelOrder = new OderModels;
    }

    public function getUiListOrder()
    {
        $this->data = [
            "dataOrder" => $this->modelOrder->getAllOrderAndAccount()
        ];
        return $this->loadView("admin/Order/ListOrder.php", $this->data);
    }
    public function getUiListOrderDetails()
    {
        $IdOrder = $this->checkParam("id", "/admin/order");
        $this->data = [
            "dataOrder" => $this->modelOrder->findOrder("IdOrder", $IdOrder, "suborders")
        ];
        return $this->loadView("admin/Order/ListOrderDetails.php", $this->data);
    }
}
