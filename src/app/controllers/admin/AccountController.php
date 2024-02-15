<?php

namespace App\app\controllers\admin;

use App\app\controllers\BaseController;
use App\app\controllers\Validate;
use App\app\models\ProductModel;
use App\app\models\AuthModels;

class AccountController extends BaseController
{

    private $modelAccount, $controllerValidate;

    public function __construct()
    {
        $this->modelAccount = new AuthModels;
        $this->controllerValidate = new Validate;
        $this->authentication("admin");
    }

    public function postCreateAccount()
    {
        extract($_POST);
        extract($_FILES);

        $NameAccountProductValidate = $this->controllerValidate->validateAll("", $NameAccount);
        $GmailValidate = $this->controllerValidate->validateAll("email", $Gmail);
        $PasswordValidate = $this->controllerValidate->validateAll("password", $Password);
        $RoleValidate = $this->controllerValidate->validateAll("", $Role);

        $data = [];
        if ($this->modelAccount->checkAccount($Gmail) !== true) {
            $this->data = ["message" => $this->modelAccount->checkAccount($Gmail)];
        } elseif ($NameAccountProductValidate !== true) {
            $this->data = ["message" => $NameAccountProductValidate];
        } elseif ($GmailValidate !== true) {
            $this->data = ["message" => $GmailValidate];
        } elseif ($PasswordValidate !== true) {
            $this->data = ["message" => $PasswordValidate];
        } elseif ($RoleValidate !== true) {
            $this->data = ["message" => $RoleValidate];
        } else {
            $data += [
                "NameAccount" => $NameAccount,
                "Gmail" => $Gmail,
                "Password" => $Password,
                "Gender" => $Gender,
                "Role" => $Role,
                "StatusAccount" => $StatusAccount,
            ];
            $imageValidate = $this->controllerValidate->validateImg($_FILES["ImageAccounts"]);
            if ($imageValidate !== true) {
                $this->data = ["message" => $imageValidate];
            } else {
                if ($this->uploadImg($ImageAccounts) === false) {
                    $data += ["message" => "Hệ thống đang bảo trì"];
                } else {
                    $data += ["ImageAccounts" => $ImageAccounts['name']];
                };
            }
            $this->data = ["message" => $this->modelAccount->createAccount($data, $ImageAccounts['name'], $Role, $StatusAccount)];
        }
        $this->getUICreateAccount();
    }

    public function getUICreateAccount()
    {
        $this->loadView("admin/Account/CreateAccount.php", $this->data);
    }

    public function deleteAccount()
    {
        $this->checkParam('id', "404");
        $result = $this->modelAccount->updateAccount($_GET['id'], ["StatusAccount" => 1]);
        if ($result === true) {
            $this->data = ["message" => "Xóa tài khoản thành công"];
        } else {
            $this->data = ["message" => "Xóa tài khoản thất bại"];
        };
        $this->getAllAccount();
    }

    public function postFromEditProduct()
    {
        extract($_POST);
        extract($_FILES);
        $idAccount = $this->checkParam('id', "404");
        $NameAccountProductValidate = $this->controllerValidate->validateAll("", $NameAccount);
        $GmailValidate = $this->controllerValidate->validateAll("email", $Gmail);
        $PasswordValidate = $this->controllerValidate->validateAll("password", $Password);
        $RoleValidate = $this->controllerValidate->validateAll("", $Role);

        $data = [];

        if ($NameAccountProductValidate !== true) {
            $this->data = ["message" => $NameAccountProductValidate];
        } elseif ($GmailValidate !== true) {
            $this->data = ["message" => $GmailValidate];
        } elseif ($PasswordValidate !== true) {
            $this->data = ["message" => $PasswordValidate];
        } elseif ($RoleValidate !== true) {
            $this->data = ["message" => $RoleValidate];
        } else {
            $data += [
                "NameAccount" => $NameAccount,
                "Gmail" => $Gmail,
                "Password" => $Password,
                "Gender" => $Gender,
                "Role" => $Role,
                "StatusAccount" => $StatusAccount,
            ];
            if (!empty($_FILES["ImageAccounts"]["name"])) {
                $imageValidate = $this->controllerValidate->validateImg($_FILES["ImageAccounts"]);
                if ($imageValidate !== true) {
                    $this->data = ["message" => $imageValidate];
                } else {
                    if ($this->uploadImg($ImageAccounts, $ImageAccountsOld) === false) {
                        $data += ["message" => "Hệ thống đang bảo trì"];
                    } else {
                        $data += ["ImageAccounts" => $ImageAccounts['name']];
                    };
                }
            } else {
                $data += ["ImageAccounts" => $ImageAccountsOld];
            }
            $this->data = ["message" => $this->modelAccount->updateAccount($idAccount, $data)];
            $this->editAccount();
        }
    }

    public function editAccount()
    {
        $this->checkParam('id', "404");
        $this->data += ["dataAccount" => $this->modelAccount->getAccount("IdAccount", $_GET['id'])];

        $this->loadView("admin/Account/EditAccount.php", $this->data);
    }

    public function getAllAccount()
    {
        $this->data += [
            "accountData" => $this->modelAccount->getAccount()
        ];
        $this->loadView("admin/Account/ListAccount.php", $this->data);
    }
}
