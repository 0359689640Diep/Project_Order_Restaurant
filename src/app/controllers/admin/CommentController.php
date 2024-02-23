<?php

namespace App\src\app\controllers\admin;

use App\src\app\controllers\BaseController;
use App\src\app\models\CommentModels;

class CommentController extends BaseController
{
    private $modelComment;

    public function __construct()
    {
        $this->modelComment = new CommentModels;
        parent::__construct();
        $this->checkAuthentication("admin");
    }

    private function checkAuthentication($type)
    {
        $this->authentication($type); // Kiểm tra đăng nhập
    }

    public function deleteComment()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelComment->updateComment("IdComment", $id, ["StatusComment" => 1]);

        $this->setResultMessage($result, "Ẩn bình luận thành công");
        $this->getUIListComment();
    }

    public function restoreComment()
    {
        $id = $this->checkParam("id", "404");
        $result = $this->modelComment->updateComment("IdComment", $id, ["StatusComment" => 0]);

        $this->setResultMessage($result, "Khôi phục bình luận thành công");
        $this->getUIListComment();
    }

    private function setResultMessage($result, $successMessage)
    {
        $this->data = ["message" => $result === true ? $successMessage : "Hệ thống đang bảo trì"];
    }

    public function getUIListComment()
    {
        $this->data += ["dataComment" => $this->modelComment->getAllComment()];
        $this->loadView("admin/comment/ListComment.php", $this->data);
    }
}
