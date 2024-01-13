<?php

namespace App\app\models;

use App\config\Connection;
use PDO;
use PDOException;

class BaseModels  extends Connection
{
    private static $message = null;
    private static $status = null;

    /**
     * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
     * */
    public static function con_QueryRUD($sql, $params)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            foreach ($params as $key => &$value) {
                $stmt->bindParam(':' . $key, $value);
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