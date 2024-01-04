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
    public function getNewTwoProduct()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadAll("
        SELECT p.IdProduct, p.NameProduct, p.ImageProduct, d.*
        FROM product p
        JOIN details d ON p.IdDetails = d.IdDetails
        WHERE p.StatusProduct = 0
        ORDER BY p.IdProduct DESC
        LIMIT 2"));
    }
    public function getCategory()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadAll("
            select * from category where StatusCategory = 0
        "));
    }
    public function getTables()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadAll("
            select * from tables where StatusTable = 1
        "));
    }
    public function getMaxNumberPeopleTables()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadOne("
            select max(NumberPeopleDefault) from tables where StatusTable = 1
        "));
    }
}