<?php

namespace App\app\models;

use App\app\models\BaseModels;

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

    public function checkOrderTable($column, $request, $tableName = "orders")
    {
        $this->tableName = $tableName;
        // test($this->con_return($this->con_QueryReadOne($this->con_find($column, $request)->sqlBuilder)));
        return $this->con_return($this->con_QueryReadOne($this->con_find($column, $request)->sqlBuilder));
    }
}
