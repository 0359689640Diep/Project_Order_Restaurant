<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\controllers\Validate;
use App\src\app\controllers\SendGmail;
use App\src\app\Models\ProductModel;
use App\src\app\Models\CategoryModels;
use App\src\app\Models\TablesModels;
use App\src\app\Models\OderModels;
use DateTime;
use DateTimeZone;

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
        $this->autoOrder(1);
        $this->autoOrder(2);
    }
    public function bookingTable()
    {
        // test($_POST);
        $dataAccount = $this->authentication('KH');
        extract($_POST);

        $validateNumberInPeople = $this->controlerValidate->validateAll("number", $NumberInPeople);
        $validateOrderDate = $this->controlerValidate->validateAll("dateBooking", $OrderDate);

        $resultCheckTable = $this->modelTables->getTablesById($IdTables)[0];
        $NumberTables = $resultCheckTable["NumberTable"];
        $resultCheckOrder = $this->modelOder->checkOrderTable(["NumberTables" => $NumberTables, "OrderDate" => $OrderDate], "table");
        // test($resultCheckTable);

        if ($resultCheckTable["NumberPeopleDefault"] < $NumberInPeople) {
            $this->data = ["message" => "Vui lòng chọn bàn lớn hơn"];
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
            "getNewTwoProduct" => $this->modelProduct->getProductQuantity(2),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "Tables" => $this->modelTables->getAllTables("StatusTable", 1),
            "MaxNumberPeopleTables" => $this->modelTables->getMaxNumberPeopleTables(),
        ];
        $this->loadView("clients\Home.php", $this->data);
    }
    // tác dụng dùng để kiểm tra và update trạng thái sản phẩm khi gần đến giờ khách hàng sử dụng
    public function autoOrder($status)
    {
        $timeReal = $this->getDateNow();
        $dataOrder = $this->modelOder->findOrder("StatusOrders", $status);
        foreach ($dataOrder as $value) {
            $timeBeforeOrder = strtotime($value['OrderDate']) + ($status === 2 ? (30 * 60) : (60 * 60));
            if (strtotime($timeReal) <= $timeBeforeOrder) {

                $newStatus = ($status === 2) ? 9 : 8;
                $result = $this->modelOder->updateOrder("IdOrder", $value["IdOrder"], ["StatusOrders" => $newStatus]);
                if ($result !== true) {
                    //  404
                }
            }
        }
    }
}
