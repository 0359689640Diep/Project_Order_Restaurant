<?php
class Connection
{
    private static $checkConnectDB = null;
    public static $message = null;
    public static $status = null;

    private static function connectDatabase()
    {
        if (self::$checkConnectDB === null) {
            try {
                self::$checkConnectDB = new PDO("mysql:host=localhost;dbname=duan1", "root", "");
                self::$checkConnectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException) {
                http_response_code(505);
                die("Kết nối không thành công");
            }
        }
        return self::$checkConnectDB;
    }
    /**
     * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
     * */
    public static function con_QueryRUD($sql)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
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
            "status" =>self::$status
            
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
            "status" =>self::$status
            
        );
        
    }
    /*
    * Lấy ID của obj mới được INSERT
    */
    public static function con_QueryCreateLastId($sql)
    {
        $conn = self::connectDatabase();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            self::$message =$conn->lastInsertId();
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
            "status" =>self::$status
            
        );
        
    }
}



?>