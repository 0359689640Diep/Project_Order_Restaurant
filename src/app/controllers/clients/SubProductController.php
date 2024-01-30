<?php

namespace App\app\controllers\clients;

use App\app\models\CategoryModels;
use App\app\models\SubProductModels;
use App\app\models\CartModels;
use App\app\controllers\BaseController;



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
            "Category" => $this->modelCategory->getCategory(),
            "dataSubProduct" => $this->modelSubProduct->getSubProductByIdProduct($IdProduct),
            "bill" => $this->modelCart->bill($this->idUser)
        ];

        $this->loadView("clients\SubProduct.php", $this->data);
    }
}
