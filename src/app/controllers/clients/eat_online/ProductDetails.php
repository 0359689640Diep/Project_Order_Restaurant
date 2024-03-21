<?php

namespace App\src\app\controllers\clients\eat_online;

use App\src\app\controllers\BaseController;
use App\src\app\Models\ProductModel;
use App\src\app\Models\SizeModels;
use App\src\app\Models\OderModels;
use App\src\app\Models\CategoryModels;
use App\src\app\Models\ProductDetailsModels;


class ProductDetails extends BaseController
{
    private $modelProduct;
    private $modelSize;
    private $OderModels;
    private $modelCategory;
    private $modelProductDetails;

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelSize = new SizeModels;
        $this->OderModels = new OderModels;
        $this->modelCategory = new CategoryModels;
        $this->modelProductDetails = new ProductDetailsModels;
    }

    public function eventHandling()
    {
        $dataAuthor = $this->authentication("KH");
        if (is_array($dataAuthor)) {
            $data = [
                "IdAccount" => $dataAuthor["IdAccount"],
                "IdProduct" => $_GET["id"],
                "IdSize" => $_POST["IdSize"],
                "QuantityCardProduct" => $_POST["Quantity"],
                "price" => $_POST["price"],
                "message" => "",
            ];

            $addToCartResult = $this->modelProductDetails->AddToCart($data);
            $this->data["message"] = $addToCartResult  === true ? "Thêm giỏ hàng thành công" : $addToCartResult;
            $this->index();
        }
    }

    public function index()
    {

        $Id = $this->checkParam('id', "404");
        $nameProduct = $this->checkParam('name', "404");

        $this->data += [
            "ProductById" => $this->modelProduct->getProductById($Id),
            "Top3ProductById" => $this->modelProduct->getProductQuantity(3),
            "AllProduct" => $this->modelProduct->getProduct(),
            "SizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
            "ListSizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
            "ListCommentByIdProduct" => $this->OderModels->findOrderComment("so.NameProduct", $nameProduct, 1),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
        ];
        return $this->loadView("clients/eat_online/ProductDetails.php", $this->data);
    }
}