<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;
use DateTime;

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

    public function checkOrderTable($data, $type)
    {
        extract($data);

        // Tạo một đối tượng DateTime từ chuỗi ngày tháng của biến $OrderDate
        $orderDateTime = new DateTime($OrderDate);
        $orderDateFormat = $orderDateTime->format("Y-m-d H:i:s");

        // Kiểm tra xem có dữ liệu trong cơ sở dữ liệu hay không
        $result = $this->con_return($this->con_QueryReadOne(
            "SELECT OrderDate FROM orders WHERE NumberTables = $NumberTables"
        ));

        if ($result === false) {
            // Nếu không có dữ liệu, trả về thông báo ngay lập tức
            return true;
        }

        // Tạo một đối tượng DateTime từ chuỗi ngày tháng của biến $OrderDate
        $orderDateTime = new DateTime($OrderDate);

        // Xác định khoảng thời gian giữa ngày đặt hàng và thời điểm hiện tại
        $currentTime = new DateTime();
        $period = $orderDateTime->diff($currentTime);

        // Kiểm tra điều kiện dựa trên loại (table hoặc order)
        if ($type === "table") {
            // Kiểm tra nếu đã qua 30 phút
            if ($period->i >= 30) {
                return true;
            }
        } else {
            // Kiểm tra nếu đã qua 1 giờ
            if ($period->h >= 1) {
                return true;
            }
        }

        // Nếu không thỏa mãn điều kiện nào, trả về thông báo mặc định
        return "Bàn: $NumberTables và thời gian: $orderDateFormat đã có người sử dụng";
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

    public function findOrderComment($column = NULL, $request = NULL, $StatusOrders = NULL)
    {
        $sql = "
            SELECT 
                o.NumberTables, 
                so.NameProduct, so.ImageProduct, so.IdSubOrders, so.Comment, so.StatusOrders,
                ac.Gmail, ac.ImageAccounts, ac.NameAccount
            FROM orders o
            JOIN suborders so ON so.IdOrder = o.IdOrder 
            JOIN account ac ON ac.IdAccount  = o.IdAccount  
            WHERE o.PaymentMethod != 0
        ";
        if ($column !== null && $request !== null && $StatusOrders = NULL) {
            $sql += " AND $column = $request AND StatusOrders = $StatusOrders ";
        }
        return $this->con_return($this->con_QueryReadAll($sql));
    }
}
