<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\controllers\Validate;
use App\app\models\CategoryModels;
use App\app\models\ProductModel;
use App\app\models\SubProductModels;

class SubProductController extends BaseController
{
    private $modelProduct, $modelSubProduct, $modelCategory, $controllerValidate;
    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelSubProduct = new SubProductModels;
        $this->modelCategory = new CategoryModels;
        $this->controllerValidate = new Validate;
        parent::__construct();
        $this->checkAuthentication("admin");
    }

    private function checkAuthentication($type)
    {
        $this->authentication($type); // Kiểm tra đăng nhập
    }


    // delete subproduct
    public function deleteProduct()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            if ($this->modelSubProduct->updateSubProductById($_GET["id"], ["StatusSubProduct" => 1]) === true) {
                $this->data = ["message" => "Xóa sản phẩm thành công"];
            }
        }
        $this->getDataProduct();
    }

    public function getDataProduct()
    {
        $this->data += [
            "dataSubProduct" => $this->modelSubProduct->getAllSubProduct(),
        ];
        $this->loadView("admin/SubProduct/ListProduct.php", $this->data);
    }

    // create subproduct
    public function postCreateProduct()
    {
        extract($_POST);
        extract($_FILES);

        $imageValidate = $this->controllerValidate->validateImg($ImageSubProduct);
        $NameSubProductProductValidate = $this->controllerValidate->validateAll("", $NameSubProduct);
        $QuantilySubProductValidate = $this->controllerValidate->validateAll("quality", $QuantilySubProduct);
        $PriceSubProductValidate = $this->controllerValidate->validateAll("", $PriceSubProduct);

        if ($NameSubProductProductValidate !== true) {
            $this->data = ["message" => $NameSubProductProductValidate];
        } elseif ($imageValidate !== true) {
            $this->data = ["message" => $imageValidate];
        } elseif (!empty($this->modelProduct->checkProductName($NameSubProduct))) {
            $this->data = ["message" => "Tên sản phẩm đã được sử dụng"];
        } elseif ($QuantilySubProductValidate !== true) {
            $this->data = ["message" => $QuantilySubProductValidate];
        } elseif ($PriceSubProductValidate !== true) {
            $this->data = ["message" => $PriceSubProductValidate];
        } else {
            move_uploaded_file($ImageSubProduct["tmp_name"], "../public/assets/img/upload/" . $ImageSubProduct["name"]);
            $data = [
                "IdProduct" => $IdProduct,
                "NameSubProduct" => $NameSubProduct,
                "QuantilySubProduct" => $QuantilySubProduct,
                "ImageSubProduct" => $ImageSubProduct["name"],
                "PriceSubProduct" => $PriceSubProduct,
                "StatusSubProduct" => $StatusSubProduct,
            ];
            $this->data = ["message" => $this->modelSubProduct->createSubProduct($data)];
        }

        $this->getUIFromCreateProduct();
    }
    public function getUIFromCreateProduct()
    {
        $this->data += [
            "dataProduct" => $this->modelProduct->getProduct()
        ];
        $this->loadView("admin/SubProduct/CreateProduct.php", $this->data);
    }

    // edit subproduct
    public function postFromEditProduct()
    {
        extract($_POST);
        extract($_FILES);

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $NameSubProductProductValidate = $this->controllerValidate->validateAll("", $NameSubProduct);
            $QuantilySubProductValidate = $this->controllerValidate->validateAll("quality", $QuantilySubProduct);
            $PriceSubProductValidate = $this->controllerValidate->validateAll("", $PriceSubProduct);

            $data = [];

            if ($NameSubProductProductValidate !== true) {
                $this->data = ["message" => $NameSubProductProductValidate];
            } elseif ($QuantilySubProductValidate !== true) {
                $this->data = ["message" => $QuantilySubProductValidate];
            } elseif ($PriceSubProductValidate !== true) {
                $this->data = ["message" => $PriceSubProductValidate];
            } else {
                $data += [
                    "IdProduct" => $IdProduct,
                    "QuantilySubProduct" => $QuantilySubProduct,
                    "PriceSubProduct" => $PriceSubProduct,
                    "StatusSubProduct" => $StatusSubProduct,
                ];

                if (!empty($_FILES["ImageSubProduct"]["name"])) {
                    $imageValidate = $this->controllerValidate->validateImg($_FILES["ImageSubProduct"]);
                    if ($imageValidate !== true) {
                        $this->data = ["message" => $imageValidate];
                    } else {
                        move_uploaded_file($_FILES["ImageSubProduct"]["tmp_name"], "../public/assets/img/upload/" . $_FILES["ImageSubProduct"]["name"]);
                        $data += ["ImageSubProduct" => $_FILES["ImageSubProduct"]["name"]];
                    }
                } else {
                    $data += ["ImageSubProduct" => $ImageSubProducts];
                }

                // test($data);
                $this->data = ["message" => $this->modelSubProduct->updateSubProductById($_GET['id'], $data)];
                $this->getFromEditProduct();
            }
        } else {
            //404
        }
    }

    public function getFromEditProduct()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->data += [
                "dataProduct" => $this->modelProduct->getProduct(),
                "dataSubProduct" => $this->modelSubProduct->getAllSubProduct("sp.IdSubProduct", $_GET['id'])
            ];
            $this->loadView("admin/SubProduct/EditProduct.php", $this->data);
        } else {
            // 404
        }
    }
}