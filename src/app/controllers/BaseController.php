<?php

namespace App\src\app\controllers;

use DateTime;
use DateTimeZone;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class BaseController
{
    protected $view = null;
    protected $layoutPath = null;
    protected $data = [];

    public function __construct()
    {
    }

    protected function loadView($viePath, $data = null)
    {
        if (file_exists("./src/app/views/$viePath")) {
            ob_start();
            if ($data != null)
                extract($data);
            include "./src/app/views/$viePath";
            $this->view = ob_get_contents();
            ob_get_clean();
        }
        if ($this->layoutPath != null)
            include "./src/app/views/$this->layoutPath";
        else
            echo $this->view;
    }

    protected function formatDate($date)
    {
        $timestamp = strtotime($date);
        return date('Y-m-d H:i', $timestamp);
    }

    protected function authentication($type)
    {
        if (isset($_SESSION[$type]) === false) {
            // Xóa bất kỳ đầu ra nào đã được gửi
            ob_clean();
            header("location: " . $_ENV['baseUrl'] . "login");
            exit(); // Thêm exit() để đảm bảo không có mã PHP tiếp tục thực thi sau khi chuyển hướng
        }
        return $_SESSION[$type];
    }

    protected function checkParam($param, $from)
    {

        if (isset($_GET["$param"]) && !empty($_GET["$param"])) {
            return $_GET[$param];
        } else {
            ob_clean();
            header("location: " . $from);
            exit();
        }
    }

    protected function nextPage($nameSection, $data, $from)
    {
        $_SESSION[$nameSection] = $data;
        ob_clean();
        header("location: " . $from);
        exit();
    }

    protected function uploadImg($imgNew, $imgOld = null)
    {
        $path = $_ENV['basePathImg'];

        // Kiểm tra xem tệp ảnh cũ có tồn tại không và xóa nó nếu có
        if ($imgOld !== null && file_exists($path . $imgOld) && !empty($imgOld)) {
            unlink($path . $imgOld);
        }

        // Di chuyển tệp ảnh mới vào thư mục đích
        if (move_uploaded_file($imgNew['tmp_name'], $path . $imgNew['name'])) {
            return true; // Trả về true nếu upload thành công
        } else {
            return false; // Trả về false nếu có lỗi xảy ra trong quá trình upload
        }
    }
    protected function getDateNow()
    {
        $dataTime = new DateTime('now', new DateTimeZone("Asia/Ho_Chi_Minh"));
        return $dataTime->format('Y-m-d\TH:i');
    }
    public function unsetSection($name)
    {
        unset($_SESSION[$name]);
        if (!isset($_SESSION[$name])) {
            ob_clean();
            header("location: " . $_ENV['baseUrl']);
            exit();
        }
    }
}

class Validate
{
    /**
     * Hàm có tác dụng validate hình ảnh
     * validateImg nhận về một mảng dữ liệu
     * $data: dữ liệu từ form post
     * */
    public function validateImg($data)
    {
        extract($data);

        if (!empty($data['name'])) {
            $type = pathinfo($data['name'], PATHINFO_EXTENSION);
            /**
             * chỉ nhận file ảnh, kích thước < 2238948
             */
            if ($type === 'jpg' || $type === 'png' || $type === 'jpeg') {
                if ($data['size'] < 2238948) {
                    return true;
                } else {
                    return "Kích cỡ ảnh quá lớn";
                }
            } else {
                return "Đây không phải file ảnh";
            }
        } else {
            return "Ảnh không được để trống ";
        }
    }

    /**
     * Hàm có tác dụng validate các trường mà không được sinh ra các function validate riêng
     * validateAll chỉ nhận 1 trường dữ liệu
     * $data: dữ liệu từ form post, chỉ nhận vào một dữ liệu duy nhất
     * Vd:$type = price; $data = 15.567;
     *  validateAll($type, $data)
     * $type: loại cần validate
     * */

    public function validateAll($type, $data)
    {
        if (empty($data)) {
            return "Dữ liệu không được để trống";
        }

        switch ($type) {
            case 'price':
                if (!preg_match("/^\d+(\.\d+)?$/", $data)) {
                    return "Giá không hợp lệ";
                }
                return true;
            case "quality":
                if (!preg_match("/^\d+$/", $data)) {
                    return "Số lượng không hợp lệ";
                }
                return true;
            case "password":
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#\$%\^\*\(\)\-_\+]).{8,}$/", $data)) {
                    return "Mật khẩu phải có ít nhất 8 ký tự, 1 ký tự viết hoa, 1 chữ số, 1 ký tự đặc biệt";
                }
                return true;
            case "email":
                if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
                    return "Email không hợp lệ";
                }
                return true;
            case "number":
                return is_numeric($data) === false ? "Dữ liệu nhận vào phải là dạng số" : true;
            case "dateBooking":
                $dataTime = new DateTime('now', new DateTimeZone("Asia/Ho_Chi_Minh"));
                $dataReal = $dataTime->format('Y-m-d\TH:i');

                $resultTime = strtotime($data) - strtotime($dataReal);
                $oneHourBefore = strtotime($dataReal) + 3600;

                if ($resultTime <= 0) {
                    return "Thời gian không hợp lệ";
                } elseif (strtotime($data) < $oneHourBefore) {
                    return "Thời gian để đặt bàn tối thiểu phải trước 1 giờ";
                }
                return true;
            default:
                return true;
        }
    }
}

class SendGmail
{
    /**
     * Hàm có tác dụng gửi gmail , hàm trả về true = thành công, false = thất bại
     * $recipientGmail: gmail của người nhận
     * $nameRecipientGmail: Tên của người nhận,
     * $titleGamil: Tiêu đề thư
     * $contentGmail: Nội dung thư 
     */

    public function SendGmailConfirmation($recipientGmail, $nameRecipientGmail, $titleGamil, $contentGmail)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->CharSet = "utf8";
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "VuDiep0359@gmail.com";
            $mail->Password = 'mytn idbn yzzl kzrp';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom("VuDiep0359@gmail.com", "Terrace Restaurant");
            $mail->addAddress($recipientGmail, $nameRecipientGmail);
            $mail->isHTML(true);
            $mail->Subject = $titleGamil;
            $content = "<h4>{$contentGmail}</h4>";
            $mail->Body = $content;
            $mail->smtpConnect(
                array(
                    'ssl' => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true,
                    )
                )
            );
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Hàm có tác dụng tạo ra một chuỗi ký tự ngẫu nghiên được sử dụng để làm mã xác nhận gửi về cho người dùng
     * length: Độ dài của chuỗi ký tự 
     */
    public function generateRandomString($length = 8)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&*';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
