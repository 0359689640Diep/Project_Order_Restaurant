<?php

namespace App\src\app\controllers\admin;

use App\src\app\controllers\BaseController;
use App\src\app\controllers\Validate;
use App\src\app\models\ProductModel;
use App\src\app\models\SizeModels;

class SizeController extends BaseController
{

    private $modelSize, $modelProduct, $validate;

    public function __construct()
    {
        $this->modelSize = new SizeModels;
        $this->modelProduct = new ProductModel;
        $this->validate = new Validate;
        parent::__construct();
        $this->checkAuthentication("admin");
    }

    private function checkAuthentication($type)
    {
        $this->authentication($type); // Kiểm tra đăng nhập
    }

    public function postSizeInProduct()
    {
        extract($_POST);
        extract($_FILES);

        $validateImg = $this->validate->validateImg($ImageSize);
        $validatePriceSize = $this->validate->validateAll("price", $PriceSize);

        if ($validateImg !== true) {
            $this->data = ["message" => $validateImg];
        } elseif ($validatePriceSize !== true) {
            $this->data = ["message" => $validatePriceSize];
        }

        $dataSize = [
            "IdProduct" => $IdProduct,
            "IdSizeDefault" => $IdSizeDefault,
            "PriceSize" => $PriceSize,
            "SEO" => empty($SEO) === true ? NULL : $SEO,
            "ImageSize" => $ImageSize['name'],
        ];

        if ($this->uploadImg($ImageSize) === true) {
            $this->data = ["message" => $this->modelSize->createSize($dataSize)];
        } else {
            $this->data = ["message" => "Hệ thống đang bảo trì"];
        }

        $this->getUIAddSizeInProduct();
    }

    public function getUIAddSizeInProduct()
    {
        $this->data += [
            "dataSizeDefault" => $this->modelSize->getSizeDefaultAndRequest("StatusSize", 0),
            "dataProduct" => $this->modelProduct->getProduct()
        ];
        $this->loadView("admin/size/addSizeInProduct.php", $this->data);
    }

    public function postEditSize()
    {
        $IdSizeDefault = $this->checkParam("IdSizeDefault", "404");
        $IdSize = $this->checkParam("IdSize", "404");
        extract($_FILES);
        extract($_POST);
        $validateSizeDefault = $this->validate->validateAll("", $SizeDefault);
        $validatePriceSize = $this->validate->validateAll("price", $PriceSize);

        if ($validateSizeDefault !== true) {
            $this->data = ["message" => $validateSizeDefault];
        } elseif ($validatePriceSize !== true) {
            $this->data = ["message" => $validatePriceSize];
        } else {

            $dataSize = [
                "IdProduct" => $IdProduct,
                "IdSizeDefault" => $IdSizeDefault,
                "PriceSize" => $PriceSize,
                "SEO" => empty($SEO) === true ? NULL : $SEO,

            ];

            $dataSizeDefault = ['SizeDefault' => $SizeDefault, "StatusSize" => $StatusSize];

            if (!empty($ImageSize['name'])) {

                $validateImageSize = $this->validate->validateImg($ImageSize);

                if ($validateImageSize !== true) {
                    $this->data = ["message" => $validateImageSize];
                } else {
                    $dataSize += ["ImageSize" => $ImageSize['name']];

                    if ($this->uploadImg($ImageSize, $ImageSizeOld !== true)) {
                        $this->data = ["message" => "Upload ảnh thất bại"];
                    }
                }
            } else {
                $dataSize += ["ImageSize" => $ImageSizeOld];
            }

            $resultUpdateSizeDefalut = $this->modelSize->updateSize("IdSizeDefault", $IdSizeDefault, $dataSizeDefault, "sizedefault");
            $resultUpdateSize = $this->modelSize->updateSize("IdSize", $IdSize, $dataSize, "size");

            if (
                $resultUpdateSizeDefalut === true &&
                $resultUpdateSize === true
            ) {
                $this->data = ["message" => "Cập nhật kích cỡ thành công"];
            } else {
                $this->data = ["message" => "Cập nhật kích cỡ thất bại"];
            }
        }

        $this->getUIEditSize();
    }

    public function getUIEditSize()
    {
        $IdSizeDefault  = $this->checkParam("IdSizeDefault", "404");
        $IdSize  = $this->checkParam("IdSize", "404");
        $this->data += [
            "dataSize" => $this->modelSize->getAllSizeAndRequest("s.IdSize", $IdSize),
            "dataSizeDefault" => $this->modelSize->getSizeDefaultAndRequest("IdSizeDefault", $IdSizeDefault),
            "dataProduct" => $this->modelProduct->getProduct()
        ];

        $this->loadView("admin/size/EditSize.php", $this->data);
    }

    public function deleteSizeInProduct()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelSize->deleteSize("IdSize", $id);
        $this->data = ['message' => $result === true ? "Xóa thành công" : "Xóa thất bại"];
        $this->getUIListSize();
    }
    public function deleteSize()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelSize->updateSize("IdSizeDefault", $id, ["StatusSize" => 1], "sizedefault");
        $this->data = ['message' => $result === true ? "Xóa kích cỡ thành công" : "Xóa kích cỡ thất bại"];
        $this->getUIListSize();
    }

    public function getUIListSize()
    {
        $this->data += ["dataSize" => $this->modelSize->getAllSizeAndRequest()];
        $this->loadView("admin/size/ListSize.php", $this->data);
    }

    public function postCreateSize()
    {
        extract($_POST);
        extract($_FILES);

        $validateImg = $this->validate->validateImg($ImageSize);
        $validateSizeDefault  = $this->validate->validateAll("", $SizeDefault);
        $validatePriceSize = $this->validate->validateAll("price", $PriceSize);

        if ($validateImg !== true) {
            $this->data = ["message" => $validateImg];
        } elseif ($validateSizeDefault !== true) {
            $this->data = ["message" => $validateSizeDefault];
        } elseif ($validatePriceSize !== true) {
            $this->data = ["message" => $validatePriceSize];
        } elseif ($this->modelSize->checkSize("SizeDefault", $SizeDefault) !== true) {
            $this->data = ["message" => "Tên kích thước đã tồn tại"];
        } else {

            $dataSizeDefault = [
                "SizeDefault" => $SizeDefault,
                "StatusSize" => $StatusSize,
            ];

            $IdSizeDefault = $this->modelSize->returnLastId($dataSizeDefault);

            $dataSize = [
                "IdProduct" => $IdProduct,
                "IdSizeDefault" => $IdSizeDefault,
                "PriceSize" => $PriceSize,
                "SEO" => empty($SEO) === true ? NULL : $SEO,
                "ImageSize" => $ImageSize['name'],
                "StatusSize" => 0
            ];

            if ($this->uploadImg($ImageSize) === true) {
                $this->data = ["message" => $this->modelSize->createSize($dataSize)];
            } else {
                $this->data = ["message" => "Hệ thống đang bảo trì"];
            }
        }

        $this->getUICreateSize();
    }

    public function getUICreateSize()
    {
        $this->data += ["dataProduct" => $this->modelProduct->getProduct()];
        $this->loadView("admin/size/CreateSize.php", $this->data);
    }
}
