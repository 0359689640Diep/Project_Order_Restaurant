<?php
require "../assets/PHPMailer-master/src/PHPMailer.php";
require "../assets/PHPMailer-master/src/SMTP.php";
require "../assets/PHPMailer-master/src/Exception.php";

/**
 * Hàm có tác dụng gửi gmail , hàm trả về true = thành công, false = thất bại
 * $recipientGmail: gmail của người nhận
 * $nameRecipientGmail: Tên của người nhận,
 * $titleGamil: Tiêu đề thư
 * $contentGmail: Nội dung thư 
 */

use PHPMailer\PHPMailer\PHPMailer;

function SendGmailConfirmation($recipientGmail, $nameRecipientGmail, $titleGamil, $contentGmail)
{
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf8";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "VuDiep0359@gmail.com";
        $mail->Password = ' dllx epph jetj hndr';
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
function generateRandomString($length = 8)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&*';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
