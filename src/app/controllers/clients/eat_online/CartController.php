<?php

namespace App\src\app\controllers\clients\eat_online;

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
        $data = $_POST;
        $dataCart = [];
        if (isset($data["IdSubCart"])) {
            foreach ($data["IdSubCart"] as $value) {
                // Xây dựng mảng tạm thời cho từng phần tử 
                $tempArray = array(
                    "IdSubCart" => $value,
                    "quantity" => $data["quantity"][$value],
                    "note" => $data["note"][$value]
                );

                // Thêm mảng tạm thời vào mảng kết quả
                $dataCart[] = $tempArray;
            }
        }
        foreach ($dataCart as  $value) {
            $relute = $this->modelCart->updateCart("IdSubCart", $value["IdSubCart"], [
                "QuantityCardProduct" => $value["quantity"],
                "Note" => $value["note"],
            ]);
            if ($relute !== true) {
                // 404
            }
        };

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

            $this->data["message"] = $this->modelCart->deleteProductInCart($_GET['delete'], "subcard")["message"];
        }
        if (isset($_GET['more']) && !empty($_GET['more'])) {
        }
        $this->data += [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "dataCart" => $this->modelCart->getAllCart($this->idUser),
            "bill" => $this->modelCart->bill($this->idUser)
        ];
        return $this->loadView("clients/eat_online/Cart.php", $this->data);
    }
}
