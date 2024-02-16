<?php

namespace App\app\models;

use App\app\models\BaseModels;

class CommentModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "comment";
    }

    public function getAllComment($id = null, $nameRequest = null, $request = null)
    {
        $sql = "
            SELECT c.*, ac.ImageAccounts, ac.NameAccount, ac.Gmail, tb.NumberTable  FROM comment c 
            JOIN account ac ON ac.IdAccount = c.IdAccount LEFT JOIN tables tb ON tb.IdTables  = c.IdTable";
        if ($id !== null) $sql .= "AND c.IdProduct = '$id'";
        if ($nameRequest !== null && $request !== null) $sql .= " WHERE $nameRequest = $request";

        return $this->con_return(
            $this->con_QueryReadAll($sql)
        );
    }

    public function updateComment($nameId, $id, $data)
    {
        return $this->con_return($this->con_update($nameId, $id, $data));
    }
}