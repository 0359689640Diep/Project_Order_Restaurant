<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\models\CategoryModels;
use App\src\app\models\CommentModels;

class CommentController extends BaseController
{
    private $modelCategory, $modelComment;

    public function __construct()
    {
        $this->modelComment = new CommentModels;
        $this->modelCategory = new CategoryModels;
    }
    public function updateComment()
    {
        $id  = $this->checkParam("id", "404");
        $result = $this->modelComment->updateComment("IdComment", $id, $_POST);
        if ($result === true) {
            $this->data["message"] = "Bình luận đã được gửi đi";
        } else {
            $this->data["message"] = "Hệ thống đang bảo trì";
        }
        $this->getUIListComment();
    }
    public function getUIListComment()
    {
        $dataAccount = $this->authentication("KH");
        $this->data += [
            "dataComment" => $this->modelComment->getAllComment(null, "c.IdAccount", $dataAccount["IdAccount"]),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
        ];
        return $this->loadView("clients/ListComment.php", $this->data);
    }
}
