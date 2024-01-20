<?php

namespace App\app\models;

use App\app\models\BaseModels;

class ProductModel
{
    public function getProduct()
    {
        $dataProduct = BaseModels::con_QueryReadAll("
        SELECT p.*
        FROM product p
        WHERE p.StatusProduct = 0");
        return BaseModels::con_return($dataProduct);
    }
    public function getNewProduct($quantity = null)
    {
        $sql = " SELECT p.* FROM product p WHERE p.StatusProduct = 0 ORDER BY p.IdProduct DESC ";
        if ($quantity !== null) {
            $sql .= "LIMIT $quantity";
        }
        return BaseModels::con_return(BaseModels::con_QueryReadAll($sql));
    }
    // public function get
    public function getProductById($Id)
    {
        return BaseModels::con_return(
            BaseModels::con_QueryReadOne("
            SELECT *  FROM product where IdProduct = $Id
            ")
        );
    }
}
