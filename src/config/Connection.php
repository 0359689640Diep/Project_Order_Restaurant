<?php

namespace App\config;

use PDO;
use PDOException;

class Connection
{
    private static $checkConnectDB = null;

    protected static function connectDatabase()
    {
        if (self::$checkConnectDB === null) {
            try {
                self::$checkConnectDB = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_Name']}", "{$_ENV['DB_USER']}", "{$_ENV['DB_PASS']}");
                self::$checkConnectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException) {
                http_response_code(505);
                die("Kết nối không thành công");
            }
        }
        return self::$checkConnectDB;
    }
}