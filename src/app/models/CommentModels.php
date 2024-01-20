<?php

namespace App\app\models;

use App\app\models\BaseModels;

class CommentModels
{
    public $data = [];
    public function getAllComment($id = null)
    {
        $sql = "
            SELECT c.*, ac.ImageAccounts, ac.NameAccount FROM comment c 
            JOIN account ac ON ac.IdAccount = c.IdAccount 
            WHERE StatusComment = 0 AND ac.StatusAccount = 0 ";
        if ($id !== null) $sql .= "AND IdProduct = '$id'";
        return BaseModels::con_return(
            BaseModels::con_QueryReadAll($sql)
        );
    }
}