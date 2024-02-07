<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\models\TablesModels;

class TablesController extends BaseController
{

    private $modelTable;

    public function __construct()
    {
        $this->modelTable = new TablesModels;
    }

    public function getUIEditTable()
    {
        $id = $this->checkParam("id", "404");
        $this->data = ["dataTables" => $this->modelTable->getAllTables("IdTables", $id)];
        $this->loadView("admin/Table/EditTable.php", $this->data);
    }

    public function deleteTable()
    {
        $id = $this->checkParam("id", "404");
        $this->data = ["message" => $this->modelTable->updateTable("IdTables", $id, ["StatusTable" => 0])];
        $this->getUIListTable();
    }

    public function getUIListTable()
    {
        $this->data += [
            "dataTables" => $this->modelTable->getAllTables()
        ];

        $this->loadView("admin/Table/ListTable.php", $this->data);
    }
}
