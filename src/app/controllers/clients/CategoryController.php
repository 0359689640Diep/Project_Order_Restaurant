<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\CategoryModels;
use App\src\app\models\ProductModel;

class CategoryController extends BaseController
{
    public $modelCategory, $modelProduct;
    public $data = [];

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelProduct = new ProductModel;
    }

    public function getProductByCategory()
    {
        if (isset($_GET['idCategory']) && !empty($_GET['idCategory'])) {
            $idCategory = $_GET['idCategory'];
            $offset = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 0;
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $this->data = [
                    'dataProduct' => $this->modelProduct->getProductAsRequested($_POST, $idCategory, $offset),
                ];
            } else {
                $this->data = [
                    'dataProduct' => $this->modelProduct->getProductByIdCategory($idCategory, $offset),
                ];
            }
            $this->data += [
                "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
                "quanlityProduct" => $this->modelProduct->getQuanlityProduct()
            ];
            $this->loadView("clients/Categorys.php", $this->data);
        } else {
            $this->data += [
                "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
                "quanlityProduct" => $this->modelProduct->getQuanlityProduct(),
                'dataProduct' => $this->modelProduct->getProductQuantity(10)
            ];
            $this->loadView("clients/Categorys.php", $this->data);
        }
    }
}