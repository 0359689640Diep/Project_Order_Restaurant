<?php

use App\src\assets\global\Notification;

include_once $_ENV["header_Path"];
if (isset($message) && !empty($message)) {
    new Notification($message);
}

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyleOnline"] ?>Bill.css">
<div class="BillPayment">
    <div class="layer"></div>
    <h1 id="title">Lịch Sử Giao Dịch</h1>
    <section class="container">

        <?php include_once $_ENV["SideBar_Path"];  ?>
        <div class="content_BillPayment">
            <table>
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Bàn</th>
                        <th>Số người trong bàn</th>
                        <th>Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Giá (VND)</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $listPaymentMethod = [
                        "0" =>  "Chưa thanh toán",
                        "1" =>  "Thanh toán tiền mặt",
                        "2" =>  "Thanh toán qua ngân hàng"
                    ];
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
                    // Lấy độ dài của mảng $dataBill
                    $length = count($dataBill);
                    // Lặp qua mảng từ cuối đến đầu
                    for ($i = $length - 1; $i >= 0; $i--) {
                        $value = $dataBill[$i];
                    ?>

                        <tr class="<?= $value['StatusOrders'] !== 2 && $value['StatusOrders'] !== 9 ? 'columnOrder' : '' ?>" data-id="<?= $value['IdOrder'] ?>">
                            <td><?= $value['IdOrder'] ?></td>
                            <td><?= $value['NumberTables'] ?></td>
                            <td><?= $value['NumberInPeople'] ?></td>
                            <td><?= select($value['PaymentMethod'], $listPaymentMethod) ?></td>
                            <td><?= select($value['StatusOrders'], $listStatus) ?></td>
                            <td><?= $value['OrderDate'] ?></td>
                            <td><?= $value['SumPriceOrder'] ?></td>
                            <td>
                                <?= $value['StatusOrders'] !== 2 && $value['StatusOrders'] !== 9 ? '<a href="' . $_ENV['basePath'] . 'billdetails?id=' . $value['IdOrder'] . '">Chi Tiết</a>' : '' ?>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="<?= $_ENV['javaScript'] ?>Bill.js"></script>