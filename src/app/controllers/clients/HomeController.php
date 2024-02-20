<?php

namespace App\app\controllers\clients;

use App\app\controllers\BaseController;
use App\app\controllers\Validate;
use App\app\Models\ProductModel;
use App\app\Models\CategoryModels;
use App\app\Models\TablesModels;
use App\app\Models\OderModels;


class HomeController extends BaseController
{
    private $modelProduct, $modelTables, $modelCategory, $modelOder, $controlerValidate;

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelCategory = new CategoryModels;
        $this->modelTables = new TablesModels;
        $this->modelOder = new OderModels;
        $this->controlerValidate = new Validate;
    }
    public function bookingTable()
    {
        $dataAccount = $this->authentication('KH');
        extract($_POST);

        $validateNumberTables = $this->controlerValidate->validateAll("number", $NumberTables);
        $validateNumberInPeople = $this->controlerValidate->validateAll("number", $NumberInPeople);
        $validateOrderDate = $this->controlerValidate->validateAll("dateBooking", $OrderDate);
        $resultCheckOrder = $this->modelOder->checkOrderTable("OrderDate", $OrderDate);

        if ($validateNumberTables !== true) {
            $this->data = ["message" => $validateNumberTables, "status" => "warrning"];
        }

        $data = [
            "IdAccount" => $dataAccount["IdAccount"],
            "NumberTables" => $NumberTables,
            "NumberInPeople" => $NumberInPeople,
            "PaymentMethod" => 0,
            "SumPriceOrder" => NULL,
            "StatusOrders" => 2,
            "OrderDate" => $OrderDate
        ];
        if ($this->modelOder->CreateOrder($data) === true) {
            $this->data = ["message" => "Cảm ơn bạn đã đặt bàn", "status" => "success"];
        } else {
            $this->data = ["message" => "Hệ thống đang bảo trì", "status" => "error"];
        };
    }



    public function index()
    {
        $this->data += [
            "Product" => $this->modelProduct->getProduct(),
            "getNewTwoProduct" => $this->modelProduct->getNewProduct(2),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "Tables" => $this->modelTables->getAllTables("StatusTable", 1),
            "MaxNumberPeopleTables" => $this->modelTables->getMaxNumberPeopleTables(),
        ];
        $this->loadView("clients\Home.php", $this->data);
    }
}
