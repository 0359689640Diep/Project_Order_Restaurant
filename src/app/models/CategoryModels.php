<?php

namespace App\app\models;

use App\app\models\BaseModels;

class CategoryModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "category";
    }

    public function getCategory($nameRequest = "StatusCategory", $request = null)
    {
        $sql = "select * from category";
        if ($request !== null) {
            $sql .= "  where $nameRequest = $request";
        }

        return $this->con_return($this->con_QueryReadAll($sql));
    }

    public function createCategory($data)
    {
        $result = $this->con_return($this->con_insert($data));
        return $result === true ? "Thêm danh mục thành công" : "Thêm danh mục thất bại";
    }

    public function updateCategory($nameId, $id, $data)
    {
        return $this->con_return($this->con_update($nameId, $id, $data));
    }
}
