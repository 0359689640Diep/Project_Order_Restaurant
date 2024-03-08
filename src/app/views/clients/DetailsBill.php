<?php

use App\src\assets\global\Notification;

include_once $_ENV["header_Path"];
if (isset($message) && !empty($message)) {
    new Notification($message);
}

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Bill.css">
<div class="BillPayment">
    <div class="layer"></div>
    <h1 id="title">Chi Tiết Yêu Cầu</h1>
    <section class="container">
        <?php include_once $_ENV["SideBar_Path"];  ?>
        <div class="content_BillPayment">
            <table>
                <tbody>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá (VND)</th>
                        <th>Số lượng </th>
                        <th>Kích cỡ</th>
                        <th>Tên sản phẩm phụ</th>
                        <th>Giá (VND)</th>
                        <th>Số lượng </th>
                        <th>Ghi chú </th>
                        <th>Trạng thái</th>
                    </tr>
                    <?php
                    $listStatus = [
                        "0" => "Ăn tại quán",
                        "1" => "Đặt bàn và sản phẩm",
                        "8" => "Bàn và sản phẩm đã sẵn sàng",
                        "2" => "Đặt bàn trước",
                        "9" => "Bàn đặt trước đã sẵn sàng",
                        "3" => "Khách đã đến cửa hàng",
                        "4" => "Khách đã sử dụng xong sản phẩm",
                        "5" => "Bếp đã làm xong sản phẩm",
                        "6" => "Nhân viên đã nhận được sản phẩm",
                        "7" => "Khách muốn thanh toán"
                    ];
                    foreach ($dataDetailsBill as  $value) : ?>
                    <tr>
                        <td> <?= $value['NameSubProduct'] ?></td>
                        <td> <?= $value['PriceProduct'] ?></td>
                        <td> <?= $value['QuantitySubOrderProduct'] ?></td>
                        <td> <?= $value['NameSize'] ?></td>
                        <td> <?= $value['NameSubProduct'] ?></td>
                        <td> <?= $value['PriceSubProduct'] ?></td>
                        <td> <?= $value['QuantitySubOrderSubProduct'] ?></td>
                        <td> <?= $value['Note'] ?></td>
                        <td> <?= select($value['StatusOrders'], $listStatus) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>