<?php

namespace App\src\app\controllers\clients;

use App\src\app\models\CategoryModels;
use App\src\app\models\ChooseTableModels;
use App\src\app\controllers\BaseController;
use App\src\app\controllers\Validate;
use App\src\app\models\OderModels;
use App\src\app\models\TablesModels;

class ChooseTableController extends BaseController
{
    private  $modelCategory, $modelChooseTable, $validate, $modelOder, $modelTables;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelChooseTable = new ChooseTableModels;
        $this->validate = new Validate;
        $this->modelOder = new OderModels;
        $this->modelTables = new TablesModels;
    }
    public function postTales()
    {
        extract($_POST);

        $validateNumberInPeople = $this->validate->validateAll("", $NumberInPeople);
        $validateTimeBooking = $this->validate->validateAll("dateBooking", $timeBooking);

        $resultCheckTable = $this->modelTables->getTablesById($IdTables)[0];
        $NumberPeopleDefault = $resultCheckTable["NumberPeopleDefault"];
        $NumberTable = $resultCheckTable["NumberTable"];

        $checkOderTable = $this->modelOder->checkOrderTable(
            ["NumberTables" => $NumberTable, "OrderDate" => $timeBooking],
            ""
        );

        if ($NumberPeopleDefault < $NumberInPeople) {
            $this->data["message"] = "Vui lòng chọn bàn lớn hơn";
        } elseif ($validateNumberInPeople !== true) {
            $this->data["message"] = $validateNumberInPeople;
        } elseif ($validateTimeBooking !== true) {
            $this->data["message"] = $validateTimeBooking;
        } elseif ($checkOderTable !== true) {
            $this->data["message"] = $checkOderTable;
        } else {
            return $this->nextPage("dataTables", $_POST, "onlinePayment");
        }
        $this->getTales();
    }
    public function getTales()
    {
        $this->data += [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "dataTables" => $this->modelChooseTable->getAllTables(),
            "maxNumberPeopleDefault" => $this->modelChooseTable->getMaxNumberPeopleDefault()
        ];
        $this->loadView("clients/ChooseTable.php", $this->data);
    }
}
