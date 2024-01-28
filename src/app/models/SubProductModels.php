<?php

namespace App\app\models;

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
}
