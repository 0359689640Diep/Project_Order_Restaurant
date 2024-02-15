<?php

namespace App\app\models;

use App\app\models\BaseModels;

class TablesModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "tables";
    }
    public function getAllTables($nameRequest = null, $request = null)
    {
        $sql = "select * from tables";
        if ($nameRequest !== null && $request !== null) {
            $sql .= " where $nameRequest = $request";
        }
        return $this->con_return($this->con_QueryReadAll($sql));
    }

    public function getTablesById($id)
    {
        return $this->con_return($this->con_QueryReadAll("
            select * from tables where StatusTable = 1 and IdTables = $id
        "));
    }

    public function getMaxNumberPeopleTables()
    {
        return $this->con_return($this->con_QueryReadOne("
            select max(NumberPeopleDefault) from tables where StatusTable = 1
        "));
    }

    public function checkTable($nameCheck, $dataCheck)
    {
        $result = $this->con_return($this->con_QueryReadOne($this->con_find($nameCheck, $dataCheck)->sqlBuilder));
        return empty($result) === true ? true : false;
    }

    public function updateTable($nameId, $id, $data)
    {
        return  $this->con_return($this->con_update($nameId, $id, $data));
    }

    public function createTable($data)
    {
        $result = $this->con_return($this->con_insert($data));

        return $result === true ? "Thêm bàn thành công" : "Thêm bàn thất bại";
    }
}
