<?php

namespace App\src\app\controllers\clients;

use App\src\app\models\CategoryModels;
use App\src\app\models\CartModels;
use App\src\app\models\TablesModels;
use App\src\app\controllers\BaseController;


class PaymentMethodsController extends BaseController
{
    private $modelCategory, $modelCart, $modelTable;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelCart = new CartModels;
        $this->modelTable = new TablesModels;
    }

    public function getClientMethodOnline()
    {
        foreach ($_SESSION["dataCart"]['IdSubCart'] as $key => $value) {
            $this->data['dataCart'][$key] = $this->modelCart->getSubCartById($value);
        }

        $retulTable = $this->modelTable->getTablesById($_SESSION["dataTables"]["IdTables"]);

        $this->data["dataTables"] = [
            "IdTables" => $_SESSION["dataTables"]["IdTables"],
            "NumberTable" => $retulTable[0]["NumberTable"],
            "timeBooking" => $_SESSION["dataTables"]["timeBooking"],
            "NumberInPeople" => $_SESSION["dataTables"]["NumberInPeople"],
        ];

        $this->data += [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "Bill" => $this->modelCart->billRequest($this->data['dataCart'])
        ];


        $this->loadView("clients/MethodOnline.php", $this->data);
    }
}
