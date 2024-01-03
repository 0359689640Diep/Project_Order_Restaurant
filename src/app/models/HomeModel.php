<?php

namespace App\app\models;

use App\app\models\BaseModels;

trait HomeModel
{
    public function getProduct()
    {
        $dataProduct = BaseModels::con_QueryReadAll("
        SELECT p.IdProduct, p.ImageProduct, p.NameProduct, 
        de.ProductDetails, de.ProductDescription 
        FROM product p
        JOIN details de ON de.IdDetails = p.IdDetails
        WHERE p.StatusProduct = 0");
        return BaseModels::con_return($dataProduct);
    }
}
