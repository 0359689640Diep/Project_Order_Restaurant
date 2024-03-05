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
    <h1 id="title">Lịch Sử Giao Dịch</h1>
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
                        "0" => "Khách ăn tại quán",
                        "1" => "Khách đặt bàn kèm sản phẩm trước ",
                        "8" => "Bàn và sản phẩm của khách đặt trước đã được chuẩn bị sẵn sàng",
                        "2" => "Đặt bàn trước",
                        "9" => "Bàn đặt trước của khách đã sẵn sàng",
                        "3" => "Khách đã đến cửa hàng",
                        "4" => "Khách đã sử dụng xong sản phẩm",
                        "5" => "Bếp đã làm xong sản phẩm",
                        "6" => "Nhân viên đã nhận được sản phẩm",
                        "7" => "Khách muốn thanh toán"
                    ];
                    foreach ($dataBill as  $value) : ?>
                    <tr class="<?= $value['StatusOrders'] !== 2 &&
                                        $value['StatusOrders'] !== 9 ? 'columnOrder' : ''
                                    ?>" data-id=<?= $value['IdOrder'] ?>>
                        <td> <?= $value['IdOrder'] ?></td>
                        <td> <?= $value['NumberTables'] ?></td>
                        <td> <?= $value['NumberInPeople'] ?></td>
                        <td> <?= select($value['PaymentMethod'], $listPaymentMethod) ?></td>
                        <td> <?= select($value['StatusOrders'], $listStatus) ?></td>
                        <td> <?= $value['OrderDate'] ?></td>
                        <td> <?= $value['SumPriceOrder'] ?></td>
                        <td>
                            <?=
                                $value['StatusOrders'] !== 2 && $value['StatusOrders'] !== 9 ?
                                    '<a href="' . $_ENV['basePath'] . 'billdetails?id=' . $value['IdOrder'] . '">Chi Tiết</a>' : ''
                                ?>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="<?= $_ENV['javaScript'] ?>Bill.js"></script>