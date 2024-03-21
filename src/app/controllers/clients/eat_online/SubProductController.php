<?php

namespace App\src\app\controllers\clients\eat_online;

use App\src\app\models\CategoryModels;
use App\src\app\models\SubProductModels;
use App\src\app\models\CartModels;
use App\src\app\controllers\BaseController;



class SubProductController extends BaseController
{

    private $modelCategory, $modelCart, $modelSubProduct, $idUser;

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelSubProduct = new SubProductModels;
        $this->modelCart = new CartModels;
        $authenticationResult = $this->authentication("KH");
        $this->idUser = $authenticationResult["IdAccount"];
    }

    public function getAllSubProduct()
    {
        $IdProduct = $this->checkParam("IdProduct", "cart");

        $this->data = [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "dataSubProduct" => $this->modelSubProduct->getSubProductByIdProduct($IdProduct),
            "bill" => $this->modelCart->bill($this->idUser)
        ];

        return $this->loadView("clients/eat_online/SubProduct.php", $this->data);
    }
}
