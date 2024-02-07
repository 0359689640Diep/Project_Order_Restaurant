<?php

namespace App\app\controllers\clients;

use App\app\models\AuthModels;
use App\app\controllers\BaseController;
use App\app\controllers\SendGmail;
use App\app\controllers\Validate;
use DateInterval;
use DateTime;

class AuthController extends BaseController
{

    public $message = [];
    private $validate;
    private $molels;
    private $sendEmail;
    private $DateTime;

    public function __construct()
    {
        $this->validate = new Validate;
        $this->molels =  new AuthModels;
        $this->sendEmail = new SendGmail;
        $this->DateTime = new DateTime;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);

            $emailValidation = $this->validate->validateAll("email", $email);
            $passwordValidation = $this->validate->validateAll("password", $password);

            if (
                $emailValidation === true && $passwordValidation
                === true
            ) {
                $this->message = $this->molels->login($_POST);
            } else {
                $this->handleValidationErrors($emailValidation, $passwordValidation);
            }
        }

        $this->loadView("clients\Login.php", $this->message);
    }

    public function signIn()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            $nameValidation = $this->validate->validateAll('name', $NameAccount);
            $gmailValidation  = $this->validate->validateAll('email', $Gmail);
            $PasswordValidation  = $this->validate->validateAll('password', $Password);
            $confirmPasswordValidation = ($confirmPassword === $Password) ? true : "Nhập lại mật khẩu không trùng khớp.";

            if (
                $nameValidation  === true &&  $gmailValidation  === true && $PasswordValidation  === true &&
                $confirmPasswordValidation === true
            ) {
                if ($this->molels->checkAccount($Gmail) === true) {

                    $codeVerify = $this->sendEmail->generateRandomString();
                    // cộng thêm 3 phút cho thời gian hiện tại 
                    $this->DateTime->add(new DateInterval('PT3M'));
                    $date = $this->DateTime->format('Y-m-d H:i:s');

                    // tiến hành gửi gmail về cho người dùng
                    $titleGmail = "Xác Nhận Tài Khoản";
                    $contentGmail = "Chào $NameAccount!<br/> Chúng tôi đã nhận được yêu cầu đăng ký tài khoản của bạn. Dưới đây là mã xác nhận tạo tài khoản. Mã có giá trị trong 3 phút:
                    <h3 style='color: red'> $codeVerify</h3>";

                    if ($this->sendEmail->SendGmailConfirmation($Gmail, $NameAccount, $titleGmail, $contentGmail) === true) {

                        // Lưu session để xác nhận tài khoản
                        $_SESSION['VerifyAccount'] = [
                            "CodeVerify" => $codeVerify,
                            "Date" => $date,
                            "Data" => $_POST
                        ];

                        header("Location: verifyAccount");
                    } else {
                        $this->message['message'] = "Hệ thống đang bảo trì";
                        http_response_code(500);
                    }
                } else {
                    $this->message["message"] = $this->molels->checkAccount($Gmail);
                    http_response_code(409);
                }
            } else {
                $this->handleValidationErrors($nameValidation,  $gmailValidation, $PasswordValidation, $confirmPasswordValidation);
            }
        }
        $this->loadView("clients\signIn.php", $this->message);
    }

    public function verifyAccount()
    {
        if (isset($_SESSION['VerifyAccount'])  && !empty($_SESSION['VerifyAccount'])) {
            extract($_SESSION['VerifyAccount']);

            $currentTime = new DateTime();
            $tagerTime = new DateTime($Date);

            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                extract($_POST);

                if ($currentTime < $tagerTime) {
                    if ($CodeVerify === $codeVerify) {
                        $this->message['message'] = $this->molels->createAccount($_SESSION['VerifyAccount']["Data"]);
                        unset($_SESSION['VerifyAccount']);
                    } else {
                        $this->message["message"] = "Mã xác nhận Không hợp lệ vui lòng thử lại";
                        http_response_code(403);
                    }
                } else {
                    $this->message["message"] = "Mã xác nhận của bạn đã hết hiệu lực vui lòng thực hiện lại";
                    http_response_code(401);
                }
            }

            $this->loadView("clients\VerificationAccount.php", $this->message);
        } else {
            http_response_code(500);
            header("Location: signIn");
        }
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
