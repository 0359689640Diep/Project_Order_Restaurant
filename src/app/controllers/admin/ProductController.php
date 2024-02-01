<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\models\ProductModel;

class ProductController extends BaseController
{
    private $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ProductModel;
    }
    public function getDataProduct()
    {
        $this->data = [
            "dataProduct" => $this->modelProduct->getProductAndCategory(),

        ];
        $this->loadView("admin/Product/ListProduct.php", $this->data);
    }
}
