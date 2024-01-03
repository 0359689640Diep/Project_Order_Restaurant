<?php

use function PHPSTORM_META\map;

/**
 * Hàm có tác dụng validate hình ảnh
 * validateImg nhận về một mảng dữ liệu
 * $data: dữ liệu từ form post
 * */
function validateImg($data)
{
    extract($data);
    $message = false;

    if (!empty($data['name'])) {
        $type = pathinfo($data['name'], PATHINFO_EXTENSION);
        /**
         * chỉ nhận file ảnh, kích thước < 2238948
         */
        if ($type === 'jpg' || $type === 'png' || $type === 'jpeg') {
            if ($data['size'] < 2238948) {
                $message = true;
            } else {
                $message = "Kích cỡ ảnh quá lớn";
            }
        } else {
            $message = "Đây không phải file ảnh";
        }
    } else {
        $message = "Ảnh không được để trống ";
    }

    return $message;
}

/**
 * Hàm có tác dụng validate các trường mà không được sinh ra các function validate riêng
 * validateAll chỉ nhận 1 trường dữ liệu
 * $data: dữ liệu từ form post, chỉ nhận vào một dữ liệu duy nhất
 * Vd:$type = price; $data = 15.567;
 *  validateAll($type, $data)
 * $type: loại cần validate
 * */

function validateAll($type, $data)
{
    $message = false;

    if (!empty($data)) {
        switch ($type) {
            case 'price':
                /**
                 * Giá nhập vào là số thập phân có dấu chấm 
                 * Không nhận chữ và kí tự viết thường
                 * không nhận dấu phẩy
                 */
                if (!preg_match("/^\d+(\.\d+)?$/", (int)$data)) {
                    $message = "Gía không hợp lệ";
                } else {
                    $message = true;
                }
                break;
            case "quality":
                /**
                 * chỉ nhận số, không nhận chữ và kí tự đặc biệt 
                 */
                if (!preg_match("/^\d+(\d+)?$/", (int)$data)) {
                    $message = "Số lượng không hợp lệ";
                } else {
                    $message = true;
                }
                break;
            case "password":
                /**
                 * chỉ nhận chuỗi bao gồm:
                 * Có 8 ký tự
                 * có ít nhất 1 số, 1 chữ cái viết thường và hoa, 1 ký tự đặc biệt
                 */
                if (preg_match("/^(?=.*[A-Z-a-z])(?=.*[0-9])(?=.*[a-z].*)(?=.*[a-z].*)(?=.*[!@#\$%\^\*\(\)-\+]).{8,}$/", $data)) {
                    $message = true;
                } else {
                    $message = "Mật khẩu phải có ít nhất 8 ký tự và phải có một ký viết hoa, một số, một ký tự đặc biệt";
                }
                break;
            case "email":
                /**
                 * chỉ nhận gmail
                 */
                if (!preg_match("~^[a-z-A-Z]+[a-z-A-Z-_\.0-9]{2,}@[a-z-A-Z-_\.0-9]{2,}\.[a-z]{2,}$~", $data)) {
                    $message = "Email không hợp lệ";
                } else {
                    $message = true;
                }
                break;
            case "dateBooking":
                $dataTime = new DateTime();
                $dataTime->setTimezone(new DateTimeZone("Asia/Ho_Chi_Minh"));
                $dataReal = $dataTime->format('Y-m-d\TH:i');
                $resultTime = strtotime($data) - strtotime($dataReal);
                $oneHourBefore = date(strtotime($dataReal) + 3600);
                // thời gian nhận vào không nhỏ hơn thời gian hiện tại
                // Và thời phải lớn hơn 1h  thì  mới họp lệ
                if ($resultTime <= 0) {
                    $message = "Thời gian không hợp lệ";
                } elseif (strtotime($data) < $oneHourBefore) {
                    $message = "Thời gian để đặt bàn tối thiểu phải trước 1 giờ";
                } else {
                    $message = true;
                }
                break;
            default:
                $message = true;
                break;
        }
    } else {
        $message = "Dữ liệu không được để trống";
    }
    return $message;
}
