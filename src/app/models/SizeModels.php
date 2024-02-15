<?php

namespace App\app\models;

use App\app\models\BaseModels;

class SizeModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "sizedefault";
    }

    public function getSizeByIdProduct($idProduct, $quantity = "")
    {
        $query = "SELECT s.*, sd.* FROM size s
              JOIN sizedefault sd ON sd.IdSizeDefault = s.IdSizeDefault 
              WHERE s.IdProduct = '$idProduct'
              ORDER BY s.IdSize DESC";

        if (is_numeric($quantity) && $quantity > 0) {
            $query .= " LIMIT $quantity";
        }

        return $this->con_return($this->con_QueryReadAll($query));
    }

    public function getSizeById($id)
    {
        return $this->con_return(
            $this->con_QueryReadOne("
                SELECT s.*, sd.* FROM  size s
                JOIN sizedefault sd on sd.IdSizeDefault = s.IdSizeDefault 
                WHERE s.IdProduct = '$id'
                ORDER BY s.IdSize DESC LIMIT 1  
            ")
        );
    }

    public function getAllSizeAndRequest($nameRequest = null, $requset = null)
    {
        $sql = "
            SELECT s.*, sd.*, p.NameProduct, p.ImageProduct FROM size s
            JOIN sizedefault sd ON sd.IdSizeDefault = s.IdSizeDefault
            JOIN product p ON p.IdProduct = s.IdProduct";

        if ($nameRequest !== null && $requset !== null) $sql .= " WHERE $nameRequest = $requset";

        return $this->con_return($this->con_QueryReadAll($sql));
    }

    public function getSizeDefaultAndRequest($nameRequest = null, $requset = null)
    {
        $sql = $this->con_getAll();

        if ($nameRequest !== null && $requset !== null) $sql =  $sql->con_where($nameRequest, "=", $requset);

        return $this->con_return($this->con_QueryReadAll($sql->sqlBuilder));
    }

    public function returnLastId($data)
    {

        $sqlIdSizeDefault  = "INSERT INTO $this->tableName (IdSizeDefault,	SizeDefault, StatusSize) VALUES (null, :SizeDefault, :StatusSize)";
        return $this->con_return($this->con_QueryCreateLastId($sqlIdSizeDefault, $data));
    }

    public function createSize($data)
    {
        $this->tableName = "size";
        return $this->con_return($this->con_insert($data)) === true  ? "Thêm kích cỡ thành công" : "Thêm kích cỡ thất bại";
    }

    public function checkSize($nameRequest, $requset)
    {

        $result = $this->con_return($this->con_QueryReadAll($this->con_find($nameRequest, $requset)->sqlBuilder));

        return empty($result);
    }

    public function updateSize($nameId, $id, $data, $tableName)
    {
        $this->tableName = $tableName;
        return $this->con_return($this->con_update($nameId, $id, $data));
    }
}
