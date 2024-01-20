<?php

namespace App\app\models;

use App\app\models\BaseModels;

class SizeModels
{
    public function getSizeByIdProduct($idProduct, $quantity = "")
    {
        $query = "SELECT s.*, sd.* FROM size s
              JOIN sizedefault sd ON sd.IdSizeDefault = s.IdSizeDefault 
              WHERE s.IdProduct = '$idProduct'
              ORDER BY s.IdSize DESC";

        if (is_numeric($quantity) && $quantity > 0) {
            $query .= " LIMIT $quantity";
        }

        return BaseModels::con_return(BaseModels::con_QueryReadAll($query));
    }

    public function getSizeById($id)
    {
        return BaseModels::con_return(
            BaseModels::con_QueryReadOne("
                SELECT s.*, sd.* FROM  size s
                JOIN sizedefault sd on sd.IdSizeDefault = s.IdSizeDefault 
                WHERE s.IdProduct = '$id'
                ORDER BY s.IdSize DESC LIMIT 1  
            ")
        );
    }
}
