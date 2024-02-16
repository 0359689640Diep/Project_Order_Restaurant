<?php

namespace App\app\controllers\clients;

use App\app\controllers\BaseController;
use App\app\Models\ProductModel;
use App\app\Models\SizeModels;
use App\app\Models\CommentModels;
use App\app\Models\CategoryModels;
use App\app\Models\ProductDetailsModels;


class ProductDetails extends BaseController
{
    public $data = [];
    private $modelProduct;
    private $modelSize;
    private $modelComment;
    private $modelCategory;
    private $modelProductDetails;

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelSize = new SizeModels;
        $this->modelComment = new CommentModels;
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
                "IdSizeDefault" => $_POST["SizeProduct"],
                "QuantityCardProduct" => $_POST["Quantity"],
                "price" => $_POST["price"],
                "message" => "",
            ];

            if (isset($_POST["pay_now"])) {
                $_SESSION["cart_pay_now"] = $data;
                header("Location: /payNow");
            } else {
                $addToCartResult = $this->modelProductDetails->AddToCart($data);
                $this->data["message"] = $addToCartResult  === true ? "Thêm giỏ hàng thành công" : $addToCartResult;
            }

            $this->index($this->data);
        }
    }

    public function index($data = [])
    {
        // Kiểm tra xem $data là mảng và có dữ liệu không
        if (is_array($data) && !empty($data)) {
            $this->data = $data;
        }

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $Id = $_GET['id'];
            $this->data += [
                "ProductById" => $this->modelProduct->getProductById($Id),
                "Top3ProductById" => $this->modelProduct->getNewProduct(3),
                "AllProduct" => $this->modelProduct->getProduct(),
                "SizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
                "ListSizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
                "ListCommentByIdProduct" => $this->modelComment->getAllComment($Id, "c.StatusComment", 0),
                "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            ];
            $this->loadView("clients\ProductDetails.php", $this->data);
        } else {
            // 404
        }
    }
}