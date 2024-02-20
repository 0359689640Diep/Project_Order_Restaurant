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
        parent::__construct();
        $this->checkAuthentication("admin");
    }

    private function checkAuthentication($type)
    {
        $this->authentication($type); // Kiểm tra đăng nhập
    }


    public function postCreateTable()
    {
        if ($this->modelTable->checkTable("NumberTable", $_POST["NumberTable"]) === true) {
            $this->data = ["message" => $this->modelTable->createTable($_POST)];
        } else {
            $this->data = ["message" => "Số bàn đã tồn tại vui lòng chọn số khác"];
        }

        $this->getUICreateTable();
    }

    public function getUICreateTable()
    {
        $this->loadView("admin/Table/CreateTable.php", $this->data);
    }

    public function postEidtTable()
    {
        $id = $this->checkParam("id", "404");
        // nếu số bàn không tồn tại thì mới cho update
        if ($this->modelTable->checkTable("NumberTable", $_POST["NumberTable"]) === true) {
            $result = $this->modelTable->updateTable("IdTables", $id, $_POST);
            if ($result === true) {
                $this->data = ["message" => "Cập nhật thành công"];
            } else {
                $this->data = ["message" => "Cập nhật thật bại"];
            };
        } else {
            $this->data = ["message" => "Số bàn đã tồn tại vui lòng chọn số khác"];
        }
        $this->getUIEditTable();
    }
    public function getUIEditTable()
    {
        $id = $this->checkParam("id", "404");
        $this->data += ["dataTables" => $this->modelTable->getAllTables("IdTables", $id)];
        $this->loadView("admin/Table/EditTable.php", $this->data);
    }

    public function deleteTable()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelTable->updateTable("IdTables", $id, ["StatusTable" => 0]);
        if ($result === true) {
            $this->data = ["message" => "Xóa thành công"];
        } else {
            $this->data = ["message" => "Xóa thật bại"];
        };
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