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
    public function getProductByIdCategory($IdCategory, $offset, $quantity = 10)
    {
        $sql = "SELECT *  FROM product where IdCategory  = $IdCategory order by IdCategory desc limit $quantity OFFSET $offset";
        return $this->con_return(
            $this->con_QueryReadAll($sql)
        );
    }
    public function getProductAsRequested($data, $idCategory, $offset, $quantity = 10)
    {
        extract($data);
        return $this->con_return(
            $this->con_QueryReadAll("
            SELECT
            p.IdProduct, p.NameProduct, p.ImageProduct, p.ProductDetails
            FROM product p
            WHERE   p.StatusProduct = 0 AND p.IdCategory = $idCategory AND
            p.NameProduct LIKE '%$contentShearch%' 
            LIMIT $quantity OFFSET $offset;
        ")
        );
    }

    public function getQuanlityProduct()
    {
        $quantityProduct = $this->con_return($this->con_QueryReadOne("SELECT COUNT(*) FROM product WHERE StatusProduct = 0"));

        return (ceil($quantityProduct["COUNT(*)"] / 10));
    }
}
