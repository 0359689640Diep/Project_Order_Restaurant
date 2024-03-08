<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;

class CommentModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "comment";
    }

    public function getAllComment($id = null, $nameRequest = null, $request = null)
    {
        $sql = "
            SELECT c.*, 
            ac.ImageAccounts, ac.NameAccount, ac.Gmail, 
            tb.NumberTable, p.ImageProduct, p.NameProduct  
            FROM comment c 
            JOIN account ac ON ac.IdAccount = c.IdAccount 
            LEFT JOIN tables tb ON tb.IdTables  = c.IdTable
            LEFT JOIN product p ON p.IdProduct = c.IdProduct              
            ";
        if ($nameRequest !== null && $request !== null) $sql .= " WHERE $nameRequest = $request";
        if ($id !== null) $sql .= " AND c.IdProduct = '$id'";
        return $this->con_return(
            $this->con_QueryReadAll($sql)
        );
    }

    public function updateComment($nameId, $id, $data)
    {
        return $this->con_return($this->con_update($nameId, $id, $data));
    }
}
