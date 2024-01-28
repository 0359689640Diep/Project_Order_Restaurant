<?php

namespace App\app\models;

class ProductModel extends BaseModels
{
    public function getProduct()
    {
        $dataProduct = $this->con_QueryReadAll("
        SELECT p.*
        FROM product p
        WHERE p.StatusProduct = 0");
        return $this->con_return($dataProduct);
    }
    public function getNewProduct($quantity = null)
    {
        $sql = " SELECT p.* FROM product p WHERE p.StatusProduct = 0 ORDER BY p.IdProduct DESC ";
        if ($quantity !== null) {
            $sql .= "LIMIT $quantity";
        }
        return $this->con_return($this->con_QueryReadAll($sql));
    }
    // public function get
    public function getProductById($Id)
    {
        return $this->con_return(
            $this->con_QueryReadOne("
            SELECT *  FROM product where IdProduct = $Id
            ")
        );
    }
}
