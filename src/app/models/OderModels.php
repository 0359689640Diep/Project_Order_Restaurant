<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;

class OderModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "orders";
    }
    public function CreateOrder($data, $tableName = "orders")
    {
        $this->tableName = $tableName;
        return $this->con_return($this->con_insert($data));
    }

    public function checkOrderTable($data)
    {
        extract($data);

        $result  = $this->con_return($this->con_QueryReadOne(
            "SELECT * FROM orders   WHERE  NumberTables = $NumberTables  AND OrderDate = '$OrderDate'"
        ));

        return $result === false ? true : "Bàn: $NumberTables và thời gian: $OrderDate đã có người sử dụng";
    }

    public function updateOrder($tableName, $column, $request)
    {
        $this->tableName = $tableName;
    }
}
