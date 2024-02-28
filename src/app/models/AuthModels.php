<?php

namespace App\src\app\models;

use App\src\app\models\BaseModels;

class AuthModels extends BaseModels
{
    public $data = [];

    public function __construct()
    {
        $this->tableName = "account";
    }

    public function login($data)
    {
        extract($data);

        $result = $this->con_QueryReadOne("
        SELECT * FROM account WHERE Gmail = '$email' AND Password = '$password' AND StatusAccount = 0
        ");
        if (!empty($result["message"])) {

            $this->setSessionAndPath($result["message"]["Role"], $result["message"]);
            $this->data["message"] = true;
        } else {
            $this->data["message"] = "Tài khoản hoặc mật khẩu không hợp lệ";
            http_response_code(403);
        }

        return $this->data;
    }

    public function createAccount($data, $ImageAccounts = null, $Role = 'KH', $StatusAccount = 0)
    {
        extract($data);

        $result  = $this->con_return($this->con_QueryRUD(
            "INSERT INTO account (IdAccount, NameAccount, Gmail, Gender, Password, ImageAccounts, Role, StatusAccount, DateEditAccount) 
            VALUES (null, :NameAccount, :Gmail, :Gender, :Password, :ImageAccounts,:Role, :StatusAccount, NOW())",
            array(
                'NameAccount' => $NameAccount,
                'Gmail' => $Gmail,
                'Gender' => $Gender,
                'Password' => $Password,
                "ImageAccounts" => $ImageAccounts,
                "Role" => $Role,
                "StatusAccount" => $StatusAccount
            )
        ));

        if ($result === true) {
            $this->data["message"] = "Tạo tài khoản thành công.";
            http_response_code(200);
        } else {
            $this->data["message"] = "Hệ thống đang bảo trì";
            http_response_code(500);
        };
        return $this->data["message"];
    }

    public function checkAccount($Gmail)
    {
        $resultCheckAccount = $this->con_QueryReadOne("select * from account where Gmail  = '$Gmail'");

        if ($resultCheckAccount["message"] === false) {
            return true;
        } else {
            return 'Gmail này đã được sử dụng';
        }
    }

    public function getAccount($nameRequest = null, $request = null)
    {
        $result = $this->con_getAll();
        if ($request !== null) {
            $result = $result->con_where($nameRequest, '=', $request);
        }
        return $this->con_return($this->con_QueryReadAll($result->sqlBuilder));
    }

    public function updateAccount($id, $data)
    {
        return $this->con_return($this->con_update("IdAccount", $id, $data));
    }

    private function setSessionAndPath($role, $message)
    {
        $this->data["path"] = $role;
        $_SESSION[$role] = $message;
    }
}