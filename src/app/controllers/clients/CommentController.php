<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\CategoryModels;
use App\src\app\models\OderModels;

class CommentController extends BaseController
{
    private $modelCategory, $modelOrder, $dataAccount;

    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->modelOrder = new OderModels;
        $this->dataAccount = $this->authentication("KH");
    }


    public function updateComment()
    {
        $id  = $this->checkParam("id", "404");
        $result = $this->modelOrder->updateOrder("IdSubOrders", $id, [
            "Comment" => $_POST["Comment"],
            "StatusOrders" => 1
        ], "suborders");
        if ($result === true) {
            $this->data["message"] = "Bình luận đã được gửi đi";
        } else {
            $this->data["message"] = "Hệ thống đang bảo trì";
        }
        $this->getUIListComment();
    }
    public function getUIListComment()
    {
        $this->dataAccount = $this->modelOrder->findOrderComment("o.IdAccount", $this->dataAccount["IdAccount"], 1);

        $this->data += [
            "dataComment" => $this->dataAccount,
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
        ];
        return $this->loadView("clients/ListComment.php", $this->data);
    }
}
