<?php

use App\src\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];

if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/ListProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Danh sách yêu cầu</h1>
    </article>
    <article class="contentMain">
        <table>
            <tr>
                <th>Mã yêu cầu</th>
                <th>Mã tài khoản</th>
                <th>Tên</th>
                <th>Gmail </th>
                <th>Ảnh</th>
                <th>Số bàn</th>
                <th>Số người</th>
                <th>Thanh Toán</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Chi tiết</th>
            </tr>
            <?php

            if (isset($dataOrder) && !empty($dataOrder)) {

                $PaymentMethod = [
                    "0" =>  "Chưa thanh toán",
                    "1" =>  "Thanh toán tiền mặt",
                    "2" =>  "Thanh toán qua ngân hàng"
                ];
                $StatusOrders = [
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
                foreach ($dataOrder as $value) : ?>
                    <tr>
                        <td><?= $value['IdOrder'] ?></td>
                        <td><?= $value['IdAccount'] ?></td>
                        <td><?= $value['NameAccount'] ?></td>
                        <td><?= $value['Gmail'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageAccounts'] ?>' alt=''>
                        </td>
                        <td><?= $value['NumberTables'] ?></td>
                        <td><?= $value['NumberInPeople'] ?></td>
                        <td><?= select($value['PaymentMethod'], $PaymentMethod) ?></td>
                        <td><?= $value['SumPriceOrder'] ?></td>
                        <td><?= select($value['StatusOrders'], $StatusOrders) ?></td>
                        <td><?= $value['OrderDate'] ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/order/orderDetails?id=<?= $value['IdOrder'] ?>'>
                                <button>Chi tiết</button>
                            </a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>
        </table>
    </article>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>