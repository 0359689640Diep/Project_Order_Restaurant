<?php

namespace App\src\app\controllers\clients\eat_online;

use App\src\app\models\CategoryModels;
use App\src\app\models\CartModels;
use App\src\app\models\TablesModels;
use App\src\app\controllers\BaseController;
use App\src\app\controllers\SendGmail;
use App\src\app\models\OderModels;
use App\src\app\models\ProductModel;
use App\src\app\models\SubProductModels;

class PaymentMethodsController extends BaseController
{
    private $modelCategory, $modelCart, $modelTable, $modelOrder, $modelProduct, $modelSubProduct, $sendEmail;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelCart = new CartModels;
        $this->modelTable = new TablesModels;
        $this->modelOrder = new OderModels;
        $this->modelProduct = new ProductModel;
        $this->modelSubProduct = new SubProductModels;
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
        return $this->loadView("clients/eat_online/MethodOnline.php", $this->data);
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
                "PriceSubProduct" =>  NULL,
                "NameSize" =>  $value["SizeDefault"],
                "QuantitySubOrderProduct" =>  $value["QuantityCardProduct"],
                "QuantitySubOrderSubProduct" =>  NULL,
                "ImageProduct" =>  $value["ImageSize"],
                "ImageSubProduct" =>  NULL,
                "StatusOrders" =>  0,
                "Note" =>  $value["Note"]
            ];
            if (isset($value["PriceSubProduct"]) && !empty($value["PriceSubProduct"])) {
                $dataSubOrder["PriceSubProduct"] = $value["PriceSubProduct"];
                $dataSubOrder["QuantitySubOrderSubProduct"] =  $value["QuantitySubCardProduct"];
                $dataSubOrder["ImageSubProduct"] =  $value["ImageSubProduct"];
            }

            if ($this->modelOrder->createOrder($dataSubOrder, "suborders") !== true) {
                $status = false;
                die;
            } else {
                $dataId = $this->modelCart->getIdProduct($value["IdSubCart"]);
                $idProduct = $dataId["IdProduct"];
                $quantityCardProduct = $value["QuantityCardProduct"];

                $this->modelProduct->updateQuantityProduct($quantityCardProduct, $idProduct);
                if ($dataId["IdSubProduct"] !== NULL) {
                    $this->modelSubProduct->updateQuantilySubProduct($value["QuantitySubCardProduct"], $dataId["IdSubProduct"]);
                }
                $this->modelCart->deleteProductInCart($value["IdSubCart"], "subcard");
                $this->modelCart->deleteProductInCart($value["IdCart"], "cart");
                $status = true;
            }
        }

        if ($status === true) {
            $this->data = ["message" => "Giao dịch thành công cảm ơn quý khách"];
            $titleGmail = "Thư cảm ơn";
            // còn thiếu gửi về cho khách hàng danh sách món ăn và giá, thời gian, số bàn....
            $contentGmail = "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi, </br> Mã order của bạn là: $idOrder";
            $this->sendEmail->SendGmailConfirmation($_SESSION["KH"]["Gmail"], $_SESSION["KH"]["NameAccount"], $titleGmail, $contentGmail);
            $this->unsetSection("dataCart");
            $this->unsetSection("dataTables", "bill");
        } else {
            $this->data = ["message" => "Hệ thống đang bảo trì"];
        }
    }
}