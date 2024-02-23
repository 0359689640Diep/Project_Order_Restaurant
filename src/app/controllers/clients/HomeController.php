<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\controllers\Validate;
use App\src\app\controllers\SendGmail;
use App\src\app\Models\ProductModel;
use App\src\app\Models\CategoryModels;
use App\src\app\Models\TablesModels;
use App\src\app\Models\OderModels;


class HomeController extends BaseController
{
    private $modelProduct, $modelTables, $modelCategory, $modelOder, $controlerValidate, $controlerSendGmail;

    public function __construct()
    {
        $this->modelProduct = new ProductModel;
        $this->modelCategory = new CategoryModels;
        $this->modelTables = new TablesModels;
        $this->modelOder = new OderModels;
        $this->controlerValidate = new Validate;
        $this->controlerSendGmail = new SendGmail;
    }
    public function bookingTable()
    {
        $dataAccount = $this->authentication('KH');
        extract($_POST);

        $validateNumberTables = $this->controlerValidate->validateAll("number", $NumberTables);
        $validateNumberInPeople = $this->controlerValidate->validateAll("number", $NumberInPeople);
        $validateOrderDate = $this->controlerValidate->validateAll("dateBooking", $OrderDate);

        $oneHourBefore = strtotime($OrderDate) + 3600;
        $oneHourBeforeFormatted = date("Y-m-d\TH:i", $oneHourBefore);
        $resultCheckOrder = $this->modelOder->checkOrderTable(["NumberTables" => $NumberTables, "OrderDate" => $oneHourBeforeFormatted]);
        if ($validateNumberTables !== true) {
            $this->data = ["message" => $validateNumberTables];
        } elseif ($validateNumberInPeople !== true) {
            $this->data = ["message" => $validateNumberInPeople];
        } elseif ($validateOrderDate !== true) {
            $this->data = ["message" => $validateOrderDate];
        } elseif ($resultCheckOrder !== true) {
            $this->data = ["message" => $resultCheckOrder];
        } else {
            $data = [
                "IdAccount" => $dataAccount["IdAccount"],
                "NumberTables" => $NumberTables,
                "NumberInPeople" => $NumberInPeople,
                "PaymentMethod" => 0,
                "SumPriceOrder" => NULL,
                "StatusOrders" => 2,
                "OrderDate" => $OrderDate
            ];
            $codeBill = $this->modelOder->CreateOrder($data);

            if ($codeBill === true) {
                $this->data = ["message" => "Cảm ơn bạn đã đặt bàn"];

                $recipientGmail  = $dataAccount["Gmail"];
                $nameRecipientGmail  = $dataAccount["NameAccount"];
                $titleGamil  = "Thư cảm ơn";
                $contentGmail = "
                    <h1>Xin chào $nameRecipientGmail</h1>. </br>
                    <p>Chúng tôi là đội ngũ nhà hàng Terrace Restaurant cám ơn bạn đã đặt bàn số: $NumberTables</p>
                    </br>
                    <h2>Mã hóa đơn của bạn là: <h2 style = 'color: red;'>$codeBill</h2></h2> ";
                $this->controlerSendGmail->SendGmailConfirmation($recipientGmail, $nameRecipientGmail, $titleGamil, $contentGmail);
            } else {
                $this->data = ["message" => "Hệ thống đang bảo trì"];
            };
        }

        $this->index();
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
