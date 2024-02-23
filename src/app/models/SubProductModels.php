<?php

namespace App\src\app\models;

class SubProductModels extends BaseModels
{

    public function __construct()
    {
        $this->tableName = "subproduct";
    }

    public function getSubProductByIdProduct($Id)
    {
        $column = ["IdSubProduct ", "NameSubProduct", "PriceSubProduct", "QuantilySubProduct", "ImageSubProduct"];

        $sql = $this->con_find("StatusSubProduct", 0,  $column)->andWhere("IdProduct", "=", $Id);

        return $this->con_return(
            $this->con_QueryReadAll($sql->sqlBuilder)
        );
    }

    public function getAllSubProduct($nameRequest = null, $request = null)
    {
        $sql = "SELECT sp.*, p.NameProduct, p.ImageProduct FROM subproduct sp JOIN product p ON p.IdProduct = sp.IdProduct";
        if ($request !== null) $sql .= " WHERE $nameRequest  = $request";

        return $this->con_return(
            $this->con_QueryReadAll($sql)
        );
    }

    public function createSubProduct($data)
    {
        return $this->con_return($this->con_insert($data));
    }

    public function updateSubProductById($id, $data)
    {
        return $this->con_return($this->con_update("IdSubProduct", $id, $data));
    }
}
