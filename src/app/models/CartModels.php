<?php

namespace App\app\models;

class CartModels extends BaseModels
{

    public function __construct()
    {
        $this->tableName = "cart";
        $this->subTableName = ["subcard", "size", "sizedefault", "product"];
    }
    public function getAllCart($idAccount)
    {
        return $this->con_return(
            $this->con_QueryReadAll("
            SELECT 
            c.IdAccount, c.IdCart,
            sc.QuantityCardProduct, sc.QuantitySubCardProduct,sc.Note,
            s.PriceSize, s.SEO, s.ImageSize, 
            sd.SizeDefault,
            p.NameProduct, p.QuantityProduct
            FROM $this->tableName c
            JOIN {$this->subTableName[0]} sc on sc.IdCart = c.IdCart
            JOIN {$this->subTableName[1]} s on sc.IdSize  = s.IdSize 
            JOIN {$this->subTableName[2]} sd on sd.IdSizeDefault = s.IdSizeDefault  
            JOIN {$this->subTableName[3]} p on p.IdProduct  = sc.IdProduct   
            WHERE c.IdAccount = '$idAccount'
            ")
        );
    }
}
