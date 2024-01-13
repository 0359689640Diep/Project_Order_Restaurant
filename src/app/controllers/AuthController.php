<?php

namespace App\app\controllers;

use App\app\models\AuthModels;
use App\app\controllers\BaseController;
use App\app\controllers\Validate;


class AuthController extends BaseController
{
    
    public $message = [];
    private $validate;
    private $molels;
    
    public function __construct()
    {
        $this->validate = new Validate;
        $this->molels =  new AuthModels;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            
            $emailValidation = $this->validate->validateAll("email", $email);
            $passwordValidation = $this->validate->validateAll("password", $password);

            if ($emailValidation === true && $passwordValidation
            === true) {
                $this->message = $this->molels->login($_POST);
            } else {
                $this->handleValidationErrors($emailValidation, $passwordValidation);
            }
        }

        $this->loadView("Login.php", $this->message);
    }

    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            $nameValidation = $this->validate->validateAll('name', $NameAccount);
            $gmailValidation  = $this->validate->validateAll('email', $Gmail);
            $PasswordValidation  = $this->validate->validateAll('password', $Password);
            $confirmPasswordValidation = ($confirmPassword === $Password) ? true : "Nhập lại mật khẩu không trùng khớp.";

            if ($nameValidation  === true &&  $gmailValidation  === true && $PasswordValidation  === true &&
            $confirmPasswordValidation === true) {
                $this->message['message'] = $this->molels->SignIn($_POST);
            } else {
                $this->handleValidationErrors($nameValidation,  $gmailValidation, $PasswordValidation, $confirmPasswordValidation);
            }
        }
        $this->loadView("signIn.php", $this->message);
    }


    private function handleValidationErrors(...$validationResults)
    {
        foreach ($validationResults as $result) {
            if ($result !== true) {
                $this->message['message'] = $result;
                http_response_code(403);
                return;
            }
        }
    }
}