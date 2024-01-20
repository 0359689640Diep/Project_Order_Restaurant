<?php

namespace App\app\models;

use App\app\models\BaseModels;

class AuthModels
{
    public $data = [];

    public function login($data)
    {
        extract($data);

        $result = BaseModels::con_QueryReadOne("
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

    public function SignIn($data)
    {
        extract($data);

        $result  = BaseModels::con_return(BaseModels::con_QueryRUD(
            "INSERT INTO account (IdAccount, NameAccount, Gmail, Gender, Password, ImageAccounts, Role, StatusAccount, DateEditAccount) 
            VALUES (null, :NameAccount, :Gmail, :Gender, :Password, null,'KH', 0, NOW())",
            array('NameAccount' => $NameAccount, 'Gmail' => $Gmail, 'Gender' => $Gender, 'Password' => $Password)
        ));

        if ($result === true) {
            $this->data["message"] = "Tạo tài khoản thành công. Vui lòng đăng nhập để sử dụng dịch vụ";
            http_response_code(200);
        } else {
            $this->data["message"] = "Hệ thống đang bảo trì";
            http_response_code(500);
        };
        return $this->data["message"];
    }

    public function checkAccount($Gmail)
    {
        $resultCheckAccount = BaseModels::con_QueryReadOne("select * from account where Gmail  = '$Gmail'");

        if ($resultCheckAccount["message"] === false) {
            $this->data["message"] = true;
            http_response_code(409);
        } else {
            $this->data["message"] = 'Gmail này đã được sử dụng vui lòng đăng nhập để sử dụng dịch vụ';
            http_response_code(409);
        }
        return $this->data["message"];
    }

    private function setSessionAndPath($role, $message)
    {
        $this->data["path"] = $role;
        $_SESSION[$role] = $message;
    }
}
