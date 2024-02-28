<?php

namespace App\src\app\controllers\clients;

use App\src\app\models\CategoryModels;
use App\src\app\models\CartModels;
use App\src\app\models\TablesModels;
use App\src\app\controllers\BaseController;
use App\src\app\controllers\SendGmail;
use App\src\app\models\OderModels;

class PaymentMethodsController extends BaseController
{
    private $modelCategory, $modelCart, $modelTable, $modelOrder, $sendEmail;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelCart = new CartModels;
        $this->modelTable = new TablesModels;
        $this->modelOrder = new OderModels;
        $this->sendEmail = new SendGmail;
    }

    public function getClientMethodOnline()
    {
        foreach ($_SESSION["dataCart"]['IdSubCart'] as $key => $value) {
            $this->data['dataCart'][$key] = $this->modelCart->getSubCartById($value);
        }

        $retulTable = $this->modelTable->getTablesById($_SESSION["dataTables"]["IdTables"]);

        $this->data["dataTables"] = [
            "IdTables" => $_SESSION["dataTables"]["IdTables"],
            "NumberTable" => $retulTable[0]["NumberTable"],
            "timeBooking" => $this->formatDate($_SESSION["dataTables"]["timeBooking"]),
            "NumberInPeople" => $_SESSION["dataTables"]["NumberInPeople"],
        ];

        $this->data += [
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
            "Bill" => $this->modelCart->billRequest($this->data['dataCart'])
        ];

        $_SESSION["dataPayment"] = $this->data;
        $this->loadView("clients/MethodOnline.php", $this->data);
    }

    public function postClientMethodOnline()
    {
        extract($_SESSION["dataPayment"]);
        $status = "";
        $dataOrder = [
            "IdAccount" =>  $_SESSION["KH"]["IdAccount"],
            "NumberTables" =>  $dataTables["NumberTable"],
            "NumberInPeople" =>  $dataTables["NumberInPeople"],
            "PaymentMethod" =>  2,
            "SumPriceOrder" =>  $Bill["PayThePrice"],
            "StatusOrders" =>  1,
            "OrderDate" =>  $dataTables["timeBooking"],
        ];

        $idOrder = $this->modelOrder->createOrderLastId($dataOrder);

        foreach ($dataCart as $value) {
            $dataSubOrder = [
                "IdSubOrders" => null,
                "IdOrder" =>  $idOrder,
                "NameSubProduct" =>  $value["NameSubProduct"],
                "NameProduct" =>  $value["NameProduct"],
                "PriceProduct" =>  $value["PriceSize"],
                "PriceSubProduct" =>  $value["PriceSubProduct"],
                "NameSize" =>  $value["SizeDefault"],
                "QuantitySubOrderProduct" =>  $value["QuantityCardProduct"],
                "QuantitySubOrderSubProduct" =>  $value["QuantitySubCardProduct"],
                "StatusOrders" =>  0,
                "Note" =>  $value["Note"]
            ];
            if ($this->modelOrder->createOrder($dataSubOrder, "suborders") !== true) {
                $status = false;
                die;
            } else {
                $status = true;
                $this->modelCart->deleteProductInCart($value["IdSubCart"]);
            }
        }

        if ($status === true) {
            $this->data = ["message" => "Giao dịch thành công cảm ơn quý khách"];
            $titleGmail = "Thư cảm ơn";
            // còn thiếu gửi về cho khách hàng danh sách món ăn và giá, thời gian, số bàn....
            $contentGmail = "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi, </br> Mã order của bạn là: $idOrder";
            $this->sendEmail->SendGmailConfirmation($_SESSION["KH"]["Gmail"], $_SESSION["KH"]["NameAccount"], $titleGmail, $contentGmail);
            header("location: bill");
        } else {
            $this->data = ["message" => "Hệ thống đang bảo trì"];
        }
    }
}
