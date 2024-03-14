<?php

namespace App\src\app\controllers\clients;

use App\src\app\controllers\BaseController;
use App\src\app\controllers\Validate;
use App\src\app\models\AuthModels;
use App\src\app\models\CategoryModels;

class PersonalPageController extends BaseController
{
    private $modelCategory, $modelAccount, $controllerValidate;
    public function __construct()
    {
        $this->modelCategory = new CategoryModels;
        $this->controllerValidate = new Validate;
        $this->modelAccount = new AuthModels;
    }
    public function deleteSection()
    {
        $this->unsetSection("KH", $_ENV['basePath']);
    }
    public function updatePersonal()
    {
        extract($_POST);
        extract($_FILES);
        $id = $this->checkParam("id", "login");

        $nameAccountValidate = $this->controllerValidate->validateAll("", $NameAccount);
        $gmailValidate = $this->controllerValidate->validateAll("email", $Gmail);

        if ($nameAccountValidate !== true) {
            $this->data["message"] = $nameAccountValidate;
        } elseif ($gmailValidate !== true) {
            $this->data["message"] = $gmailValidate;
        } else {
            $this->data = [
                "NameAccount" => $NameAccount,
                "Gmail" => $Gmail,
                "Password" => $Password,
                "Gender" => $Gender,
            ];
            if (!empty($ImageAccounts["name"])) {
                $imageAccountsValidate = $this->controllerValidate->validateImg($ImageAccounts);
                if ($imageAccountsValidate !== true) {
                    $this->data["message"] = $imageAccountsValidate;
                } else {
                    $this->data += [
                        "ImageAccounts" => $ImageAccounts["name"]
                    ];
                    $resultUpdateAccount = $this->modelAccount->updateAccount($id, $this->data);
                    $resultUploadImg = $this->uploadImg($ImageAccounts, $ImageAccountsOld);
                    if ($resultUpdateAccount === true && $resultUploadImg === true) {

                        $_SESSION["KH"]["NameAccount"] = $NameAccount;
                        $_SESSION["KH"]["Gmail"] = $Gmail;
                        $_SESSION["KH"]["Password"] = $Password;
                        $_SESSION["KH"]["ImageAccounts"] = $ImageAccounts["name"];
                        $_SESSION["KH"]["Gender"] = $Gender;

                        $this->data["message"] = "Cập nhật tài khoản thành công";
                    } else {
                        $this->data["message"] = "Hệ thống đang bảo trì";
                    }
                }
            } else {
                $this->data += [
                    "ImageAccounts" => $ImageAccountsOld
                ];
                $resultUpdateAccount = $this->modelAccount->updateAccount($id, $this->data);
                if ($resultUpdateAccount === true) {

                    $_SESSION["KH"]["NameAccount"] = $NameAccount;
                    $_SESSION["KH"]["Gmail"] = $Gmail;
                    $_SESSION["KH"]["Password"] = $Password;
                    $_SESSION["KH"]["ImageAccounts"] = $ImageAccountsOld;
                    $_SESSION["KH"]["Gender"] = $Gender;

                    $this->data["message"] = "Cập nhật tài khoản thành công";
                } else {
                    $this->data["message"] = "Hệ thống đang bảo trì";
                }
            }
        }
        $this->getUIPersonal();
    }
    public function getUIPersonal()
    {
        $this->data += [
            "dataProfile" => $this->authentication("KH"),
            "Category" => $this->modelCategory->getCategory("StatusCategory", 0),
        ];
        return $this->loadView("clients\PersonalPage.php", $this->data);
    }
}
