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
        <section class="asside">
            <section class="headerAsside">
                <article class="img">
                    <img src="<?= $_ENV["imgUpload"] . $_SESSION['KH']['ImageAccounts'] ?>"
                        alt="<?= $dataProfile['ImageAccounts'] ?>">
                </article>
                <article class="name">
                    <h1> <?= $_SESSION['KH']['NameAccount'] ?> </h1>
                </article>
            </section>
            <section class="mainAside">
                <ul>
                    <li> <a href="<?= $_ENV['basePath'] ?>PersonalPage">Trang cá nhân</a> <i class="ti-angle-down"></i>
                    </li>
                    <li> <a href="<?= $_ENV['basePath'] ?>billthanhtoan">Lịch sử thanh toán</a> <i
                            class="ti-angle-down"></i> </li>
                    <li> <a href="<?= $_ENV['basePath'] ?>AddComment">Bình luận sản phẩm</a> <i
                            class="ti-angle-down"></i> </li>
                    <li> <a href="<?= $_ENV['basePath'] ?>ListComment">Sản phẩm đã bình luận</a> <i
                            class="ti-angle-down"></i> </li>
                </ul>
            </section>
        </section>
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
                        "0" => "Khách ăn tại quán",
                        "1" => "Khách đặt bàn kèm sản phẩm trước ",
                        "8" => "Bàn và sản phẩm của khách đặt trước đã được chuẩn bị sẵn sàng",
                        "2" => "Đặt bàn trước",
                        "9" => "Bàn đặt trước của khách đã sẵn sàng",
                        "3" => "Khách đã đến cửa hàng( Chỉ áp dụng cho khách đặt online)",
                        "4" => "Khách đã sử dụng xong sản phẩm( Chỉ áp dụng cho khách đặt online)",
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