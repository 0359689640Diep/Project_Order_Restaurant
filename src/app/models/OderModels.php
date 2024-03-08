<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;

class OderModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "orders";
    }

    public function getALLOrderByIdAccount($idAccount)
    {
        return $this->con_return($this->con_QueryReadAll("
            SELECT ord.* FROM orders ord 
            WHERE ord.IdAccount = $idAccount
            ORDER BY ord.OrderDate ASC
        "));
    }

    public function createOrderLastId($data)
    {
        return $this->con_return($this->con_QueryCreateLastId(
            "INSERT INTO orders (IdOrder ,IdAccount ,NumberTables ,NumberInPeople, PaymentMethod, SumPriceOrder, StatusOrders, OrderDate) VALUES (NULL,:IdAccount,:NumberTables,:NumberInPeople,:PaymentMethod, :SumPriceOrder,:StatusOrders,:OrderDate)",
            $data
        ));
    }

    public function createOrder($data, $tableName = "orders")
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

    public function updateOrder($column, $request, $data, $tableName = "orders")
    {
        $this->tableName = $tableName;
        return $this->con_return($this->con_update($column, $request, $data));
    }

    public function findOrder($column, $request, $tableName = "orders")
    {
        $this->tableName = $tableName;

        return $this->con_return($this->con_QueryReadAll($this->con_find($column, $request)->sqlBuilder));
    }
}
