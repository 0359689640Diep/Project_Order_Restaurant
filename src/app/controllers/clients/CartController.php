<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\CategoryModels;
use App\src\app\models\CartModels;

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

    public function postProduct()
    {
        if (isset($_POST["SubProduct"]) && isset($_GET['IdSubCart'])) {
            $this->modelCart->addSubProductInCart($_GET['IdSubCart'], $_POST);
            $this->data["message"] = "Thêm sản phẩm thành công";
        };
        if (isset($_POST["SelectTable"])) {
            return $this->nextPage("dataCart", $_POST, "chooseTable");
        };
        $this->getProduct($this->data);
    }

    public function getProduct($data = [])
    {
        if (is_array($data) && !empty($data)) {
            $this->data = $data;
        }

        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $this->data["message"] = $this->modelCart->deleteProductInCart($_GET['delete'])["message"];
        }
        if (isset($_GET['more']) && !empty($_GET['more'])) {
        }
        $this->data += [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "dataCart" => $this->modelCart->getAllCart($this->idUser),
            "bill" => $this->modelCart->bill($this->idUser)
        ];
        $this->loadView("clients\Cart.php", $this->data);
    }
}
