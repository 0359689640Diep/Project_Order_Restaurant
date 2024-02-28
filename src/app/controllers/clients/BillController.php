<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\OderModels;

class BillController extends BaseController
{
    private $modelOrder;
    public function __construct()
    {
        $this->modelOrder = new OderModels;
    }
    public function getUIBill()
    {
        $dataAccount = $this->authentication("KH");
        // test();
        $this->data = ["dataBill" => $this->modelOrder->getALLOrderByIdAccount($dataAccount["IdAccount"])];
        return $this->loadView("clients/Bill.php", $this->data);
    }
}
