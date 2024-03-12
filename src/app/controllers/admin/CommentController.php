<?php

namespace App\src\app\controllers\admin;

use App\src\app\controllers\BaseController;
use App\src\app\models\OderModels;

class CommentController extends BaseController
{
    private $modelOrder;

    public function __construct()
    {
        $this->modelOrder = new OderModels;
        parent::__construct();
        $this->authentication("admin");
    }

    public function deleteComment()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelOrder->updateOrder("IdSubOrders", $id, ["StatusOrders" => 2], "suborders");

        $this->setResultMessage($result, "Ẩn bình luận thành công");
        $this->getUIListComment();
    }

    public function restoreComment()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelOrder->updateOrder("IdSubOrders", $id, ["StatusOrders" => 1], "suborders");

        $this->setResultMessage($result, "Khôi phục bình luận thành công");
        $this->getUIListComment();
    }

    private function setResultMessage($result, $successMessage)
    {
        $this->data = ["message" => $result === true ? $successMessage : "Hệ thống đang bảo trì"];
    }

    public function getUIListComment()
    {
        $this->data += ["dataComment" => $this->modelOrder->findOrderComment()];
        $this->loadView("admin/comment/ListComment.php", $this->data);
    }
}
