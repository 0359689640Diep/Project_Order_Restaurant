<?php

namespace App\src\assets\global;

use App\src\app\controllers\BaseController;
use App\src\app\models\OderModels;
use App\src\app\models\TablesModels;
use DateTime;

class Auto_Check extends BaseController
{
    private $modelOder, $modelTables;
    public function __construct()
    {
        $this->modelOder = new OderModels;
        $this->modelTables = new TablesModels;
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
                $newStatusTable = ($status === 2) ? 3 : 4;

                $resultTable = $this->modelTables->updateTable("NumberTable", $value["NumberTables"], ["StatusTable" => $newStatusTable]);
                $result = $this->modelOder->updateOrder("IdOrder", $value["IdOrder"], ["StatusOrders" => $newStatus]);

                if ($result !== true && $resultTable !== true) {
                    // Xử lý lỗi nếu cập nhật không thành công
                    echo "<pre>";
                    var_dump($resultTable);
                    echo "<pre>";

                    die($result);
                }
            }
        }
    }
}
