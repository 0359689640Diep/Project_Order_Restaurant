<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\controllers\Validate;
use App\app\models\CategoryModels;
use App\app\models\ProductModel;

class ProductController extends BaseController
{
    private $modelProduct, $modelCategory, $controllerValidate;
    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelCategory = new CategoryModels;
        $this->controllerValidate = new Validate;
        $this->authentication("admin");
    }


    public function deleteProduct()
    {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            if ($this->modelProduct->remoteProduct($_GET["id"]) === true) {
                $this->data = ["message" => "Xóa sản phẩm thành công"];
            }
        }
        $this->getDataProduct();
    }

    public function getDataProduct()
    {
        $this->data += [
            "dataProduct" => $this->modelProduct->getProductAndCategory("p.StatusProduct"),
        ];
        $this->loadView("admin/Product/ListProduct.php", $this->data);
    }

    public function postCreateProduct()
    {
        extract($_POST);
        extract($_FILES);

        $imageValidate = $this->controllerValidate->validateImg($ImageProduct);
        $NameProductProductValidate = $this->controllerValidate->validateAll("", $NameProduct);
        $QuantityProductValidate = $this->controllerValidate->validateAll("quality", $QuantityProduct);
        $ProductDetailsValidate = $this->controllerValidate->validateAll("", $ProductDetails);
        $ProductDescriptionValidate = $this->controllerValidate->validateAll("", $ProductDescription);

        if ($NameProductProductValidate !== true) {
            $this->data = ["message" => $NameProductProductValidate];
        } elseif ($imageValidate !== true) {
            $this->data = ["message" => $imageValidate];
        } elseif (!empty($this->modelProduct->checkProductName($NameProduct))) {
            $this->data = ["message" => "Tên sản phẩm đã được sử dụng"];
        } elseif ($QuantityProductValidate !== true) {
            $this->data = ["message" => $QuantityProductValidate];
        } elseif ($ProductDetailsValidate !== true) {
            $this->data = ["message" => $ProductDetailsValidate];
        } elseif ($ProductDescriptionValidate !== true) {
            $this->data = ["message" => $ProductDescriptionValidate];
        } else {
            move_uploaded_file($ImageProduct["tmp_name"], "../public/assets/img/upload/" . $ImageProduct["name"]);
            $data = [
                "IdCategory" => $IdCategory,
                "NameProduct" => $NameProduct,
                "QuantityProduct" => $QuantityProduct,
                "ImageProduct" => $ImageProduct["name"],
                "ProductDetails" => $ProductDetails,
                "ProductDescription" => $ProductDescription,
                "StatusProduct" => $StatusProduct,
            ];
            $this->data = ["message" => $this->modelProduct->createProduct($data)];
        }

        $this->getUIFromCreateProduct();
    }

    public function postFromEditProduct()
    {
        extract($_POST);
        extract($_FILES);

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $NameProductProductValidate = $this->controllerValidate->validateAll("", $NameProduct);
            $QuantityProductValidate = $this->controllerValidate->validateAll("quality", $QuantityProduct);
            $ProductDetailsValidate = $this->controllerValidate->validateAll("", $ProductDetails);
            $ProductDescriptionValidate = $this->controllerValidate->validateAll("", $ProductDescription);

            $data = [];

            if ($NameProductProductValidate !== true) {
                $this->data = ["message" => $NameProductProductValidate];
            } elseif ($QuantityProductValidate !== true) {
                $this->data = ["message" => $QuantityProductValidate];
            } elseif ($ProductDetailsValidate !== true) {
                $this->data = ["message" => $ProductDetailsValidate];
            } elseif ($ProductDescriptionValidate !== true) {
                $this->data = ["message" => $ProductDescriptionValidate];
            } else {
                $data += [
                    "IdCategory" => $IdCategory,
                    "NameProduct" => $NameProduct,
                    "QuantityProduct" => $QuantityProduct,
                    "ProductDetails" => $ProductDetails,
                    "ProductDescription" => $ProductDescription,
                    "StatusProduct" => $StatusProduct,
                ];
                if (!empty($_FILES["ImageProduct"]["name"])) {
                    $imageValidate = $this->controllerValidate->validateImg($_FILES["ImageProduct"]);
                    if ($imageValidate !== true) {
                        $this->data = ["message" => $imageValidate];
                    } else {
                        move_uploaded_file($_FILES["ImageProduct"]["tmp_name"], "../public/assets/img/upload/" . $_FILES["ImageProduct"]["name"]);
                        $data += ["ImageProduct" => $_FILES["ImageProduct"]["name"]];
                    }
                } else {
                    $data += ["ImageProduct" => $ImageProducts];
                }
                $this->data = ["message" => $this->modelProduct->updateProduct($_GET['id'], $data)];
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
                "dataProduct" => $this->modelProduct->getProductAndCategory("p.IdProduct", $_GET['id'])
            ];
            $this->loadView("admin/Product/EditProduct.php", $this->data);
        } else {
            // 404
        }
    }
    public function getUIFromCreateProduct()
    {
        $this->data += [
            "dataCategory" => $this->modelCategory->getCategory("StatusCategory", 0)
        ];
        $this->loadView("admin/Product/CreateProduct.php", $this->data);
    }
}
