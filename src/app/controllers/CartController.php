<?php

namespace App\app\controllers;

use App\app\controllers\BaseController;
use App\app\models\CategoryModels;
use App\app\models\CartModels;

class CartController extends BaseController
{
    public $data = [];
    private $modelCategory, $modelCart, $idUser;

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelCart = new CartModels;
        $authenticationResult = $this->authentication("KH");
        $this->idUser = $authenticationResult["IdAccount"];
    }
    public function getProduct()
    {
        $this->data = [
            "category" => $this->modelCategory->getCategory(),
            "dataCart" => $this->modelCart->getAllCart($this->idUser),
        ];
        $this->loadView("clients\Cart.php", $this->data);
    }
}
