<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;

class ProductDetailsModels
{
    public $data = [];
    public function AddToCart($data)
    {
        extract($data);

        $RetultCart = BaseModels::con_QueryCreateLastId("INSERT INTO cart (IdAccount) VALUES(:IdAccount)", array('IdAccount' => $IdAccount));

        extract($RetultCart);
        if ($status === 200) {
            return BaseModels::con_return(
                BaseModels::con_QueryRUD("INSERT INTO subcard (IdSubCart, IdCart, IdSubProduct , IdProduct, IdSize, QuantityCardProduct, QuantitySubCardProduct, Note) VALUES(null, :IdCart, null, :IdProduct, :IdSize, :QuantityCardProduct, null, null)", array(
                    'IdCart' => $message,
                    'IdProduct' => $IdProduct,
                    'IdSize' => $IdSize,
                    'QuantityCardProduct' => $QuantityCardProduct
                ))
            );
        } else {
            return  "Hệ thống đang bảo trì 27";
            // test($RetultCart);
        }
    }
}
