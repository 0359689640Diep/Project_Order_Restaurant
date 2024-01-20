<?php

namespace App\app\controllers;

use App\app\controllers\BaseController;
use App\app\Models\ProductModel;
use App\app\Models\SizeModels;
use App\app\Models\CommentModels;
use App\app\Models\CategoryModels;


class ProductDetails extends BaseController
{
    public $data = [];
    private $modelProduct;
    private $modelSize;
    private $modelComment;
    private $modelCategory;

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelSize = new SizeModels;
        $this->modelComment = new CommentModels;
        $this->modelCategory = new CategoryModels;
    }

    public function index()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $Id = $_GET['id'];
            $this->data = [
                "ProductById" => $this->modelProduct->getProductById($Id),
                "Top3ProductById" => $this->modelProduct->getNewProduct(3),
                "AllProduct" => $this->modelProduct->getProduct(),
                "SizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
                "ListSizeByIdProduct" => $this->modelSize->getSizeByIdProduct($Id),
                "ListCommentByIdProduct" => $this->modelComment->getAllComment($Id),
                "Category" => $this->modelCategory->getCategory(),
            ];
            $this->loadView("ProductDetails.php", $this->data);
        } else {
            // 404
        }
    }
}