<?php

namespace App\app\models;

use App\config\Connection;
use PDO;
use PDOException;

class BaseModels  extends Connection
{
    private static $message = null;
    private static $status = null;
    protected $sqlBuilder = "";
    protected $tableName;
    protected $subTableName = [];
    protected $data;

    /**
     * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
     * */
    public static function con_QueryRUD($sql, $params)
    {

        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            foreach ($params as $key => &$value) {
                $stmt->bindParam(':' . $key, $value, \PDO::PARAM_INT);
            }
            $stmt->execute();
            self::$message = true;
            self::$status = 200;
        } catch (PDOException $e) {
            http_response_code(400);
            self::$status = 400;
            self::$message = $e->getMessage();
        } finally {
            unset($conn);
        }

        return array(
            "message" => self::$message,
            "status" => self::$status
        );
    }

    /**
     * Thực thi câu lệnh sql thao tác dữ liệu (SELECT) 
     * Trả về 1 bản ghi
     * */
    public static function con_QueryReadOne($sql)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            self::$message = $stmt->fetch(PDO::FETCH_ASSOC);
            self::$status = 200;
        } catch (PDOException $e) {
            http_response_code(400);
            self::$status = 400;
            self::$message = $e->getMessage();
        } finally {
            unset($conn);
        }

        return array(
            "message" => self::$message,
            "status" => self::$status

        );
    }
    /**
     * Thực thi câu lệnh sql thao tác dữ liệu (SELECT)
     * */
    public static function con_QueryReadAll($sql)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            self::$message = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::$status = 200;
        } catch (PDOException $e) {
            http_response_code(400);
            self::$status = 400;
            self::$message = $e->getMessage();
        } finally {
            unset($conn);
        }

        return array(
            "message" => self::$message,
            "status" => self::$status

        );
    }
    /*
    * Lấy ID của obj mới được INSERT
    */
    public static function con_QueryCreateLastId($sql, $params)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            foreach ($params as $key => &$value) {
                $stmt->bindParam(':' . $key, $value);
            }
            $stmt->execute();
            self::$message = $conn->lastInsertId();
            self::$status = 200;
        } catch (PDOException $e) {
            http_response_code(400);
            self::$status = 400;
            self::$message = $e->getMessage();
        } finally {
            unset($conn);
        }
        return array(
            "message" => self::$message,
            "status" => self::$status
        );
    }

    // Phương thức lấy ra toàn bộ dữ liệu của bảng
    public static function con_getAll($params = null)
    {
        $model = new static;
        if ($params === null)
            $model->sqlBuilder = "SELECT * FROM $model->tableName";
        else {
            // Chuyển mảng thành chuỗi
            $column = implode(",", $params);
            $model->sqlBuilder = "SELECT $column FROM $model->tableName";
        }
        return $model;
    }
    // Phương thức lấy cập nhật dữ liệu của bảng
    /**
     * Method update: Dùng để cập nhật dữ liệu
     * id: giá trị của khóa chính
     * data: mảng dữ liệu cần cập nhât, phải được thết kế có key và value
     * key phải là tên cột
     */
    public function con_update($nameId, $id, $data)
    {
        $this->sqlBuilder = "UPDATE $this->tableName SET ";
        foreach ($data as $column => $value) {
            $this->sqlBuilder .= "{$column} = :$column,";
        }
        // xoa, loai bo dau ,
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        // nối câu lệnh điều kiện
        $this->sqlBuilder .= " WHERE  $nameId = :$nameId";
        // đưa id vào trong mảng
        $data[$nameId] = $id;

        return $this->con_QueryRUD($this->sqlBuilder, $data);
    }
    /**
     * Phương thức find: Dùng để tìm dữ liệu theo yêu cầu
     * 
     */
    public static function con_find($nameRequest, $request, $params = null)
    {
        $model = new static;
        if ($params !== null) {
            $column  = implode(",", $params);
            $model->sqlBuilder = "SELECT $column FROM $model->tableName WHERE $nameRequest = $request";
        } else {
            $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $nameRequest = $request";
        }
        return $model;
    }

    /**
     * Xử lý câu lệnh có điều kiện
     * $column là tên cột
     * $codition điều kiện (>, <, =, ...)
     * $value giá trị
     */

    public static function con_where($column, $codition, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $column $codition $value";
        return $model;
    }
    // thêm điều kiện and cho hàm trên
    public function andWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " AND `$column` $codition '$value'";
        return $this;
    }
    public function orWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " OR `$column` $codition '$value'";
        return $this;
    }
    // Xóa dữ liệu
    public static function con_delete($tableName, $column, $id)
    {
        $model = new static;
        $conn = self::connectDatabase();
        try {
            $model->sqlBuilder = "DELETE FROM $tableName WHERE $column = $id";
            $stmt = $conn->prepare($model->sqlBuilder);
            $stmt->execute();
            self::$message = true;
            self::$status = 200;
        } catch (PDOException $e) {
            http_response_code(400);
            self::$status = 400;
            self::$message = $e->getMessage();
        } finally {
            unset($conn);
        }
        return array(
            "message" => self::$message,
            "status" => self::$status
        );
    }
    // thêm dữ liệu
    public static function con_insert($data)
    {
        $model = new static;
        $model->sqlBuilder = "INSERT INTO $model->tableName(";

        // lưu lại value của câu lệnh sql
        $value = " VALUES(";
        // lặp để lấy ey (tên cột của bảng) trong data
        foreach ($data as $column => $value) {
            $model->sqlBuilder .= "`{$column}, `";
            $value .= ":$column";
            // Xóa dâu , ơ bên phải chuỗi
            $model->sqlBuilder .= ")" . $value . ")";
            $model->con_QueryRUD($model->sqlBuilder, $data);
        }
    }
    public static function con_return($data)
    {
        if ($data["status"] === 400) {
            http_response_code($data["status"]);
            echo $data["message"];
            die();
        } else {
            http_response_code($data["status"]);
            return $data["message"];
        }
    }
}
