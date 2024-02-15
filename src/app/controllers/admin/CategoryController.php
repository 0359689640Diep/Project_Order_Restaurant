<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\models\CategoryModels;

class CategoryController extends BaseController
{
    private $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->authentication("admin");
    }

    public function CreateCategory()
    {
        $this->data = ["message" => $this->modelCategory->createCategory($_POST)];
        $this->getUICreateCategory();
    }

    public function getUICreateCategory()
    {
        $this->loadView("admin/Category/CreateCategory.php", $this->data);
    }

    public function postEditCategory()
    {
        $id = $this->checkParam('id', "404");
        $this->data = [
            "message" =>
            $this->modelCategory->updateCategory("IdCategory", $id, $_POST) === true ? "Cập nhật thành công" : "Cập nhật thất bại"
        ];

        $this->getUIEditCategory();
    }

    public function getUIEditCategory()
    {
        $id = $this->checkParam('id', "404");
        $this->data += ["dataCategory" => $this->modelCategory->getCategory("IdCategory", $id)];
        $this->loadView("admin/Category/EditCategory.php", $this->data);
    }

    public function deleteCategory()
    {
        $id  = $this->checkParam('id', "404");
        $result = $this->modelCategory->updateCategory("IdCategory", $id, ["StatusCategory" => 1]);
        $this->data = ["message" => $result  === true ? "Xóa sản phẩm thành công" : "Xóa sản phẩm thất bại"];
        $this->getUIListCategory();
    }

    public function getUIListCategory()
    {
        $this->data += [
            "dataCategory" => $this->modelCategory->getCategory()
        ];
        $this->loadView("admin/Category/ListCategory.php", $this->data);
    }
}
