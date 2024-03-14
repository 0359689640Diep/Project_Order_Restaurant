<?php

namespace App\src\assets\global;

use App\src\app\controllers\BaseController;
use App\src\app\models\OderModels;
use DateTime;

class Auto_Check extends BaseController
{
    private $modelOder;
    public function __construct()
    {
        $this->modelOder = new OderModels;
        $this->autoOrder(1);
        $this->autoOrder(2);
    }
    // tác dụng dùng để kiểm tra và update trạng thái sản phẩm khi gần đến giờ khách hàng sử dụng
    public function autoOrder($status)
    {
        $timeReal = new DateTime($this->getDateNow());

        $dataOrder = $this->modelOder->findOrder("StatusOrders", $status);

        foreach ($dataOrder as $value) {
            $time = ($status === 2) ? '+30 minutes' : '+1 hour';

            $timeBeforeOrder = new DateTime($value['OrderDate']);
            $timeBeforeOrder->modify($time);

            // So sánh hai đối tượng DateTime

            if ($timeReal >= $timeBeforeOrder) {
                $newStatus = ($status === 2) ? 9 : 8;
                $result = $this->modelOder->updateOrder("IdOrder", $value["IdOrder"], ["StatusOrders" => $newStatus]);
                if ($result !== true) {
                    // Xử lý lỗi nếu cập nhật không thành công
                }
            }
        }
    }
}
