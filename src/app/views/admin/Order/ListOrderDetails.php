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
        <h1>Chi tiết yêu cầu</h1>
    </article>

    <article class="contentMain">
        <table>
            <tr>
                <th>Chọn sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm phụ</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Kích cỡ </th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
            </tr>
            <?php

            if (isset($dataOrder) && !empty($dataOrder)) {

                $StatusOrders = [
                    "0" =>  "Chưa comment",
                    "1" =>  "Đã comment",
                    "2" =>  "Ẩn comment",
                    "3" =>  "Khách muốn đổi lại món",
                ];
                foreach ($dataOrder as $value) : ?>
                    <tr>
                        <td>
                            <input type="checkbox" value="<?= $value['IdSubOrders'] ?>" data-id="<?= $value['IdOrder'] ?>" name="printOrder" id="">
                        </td>
                        <td><?= $value['NameSubProduct'] ?></td>
                        <td><?= $value['PriceProduct'] ?></td>
                        <td><?= $value['QuantitySubOrderProduct'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageProduct'] ?>' alt=''>
                        </td>
                        <td><?= $value['NameSubProduct'] ?></td>
                        <td><?= $value['PriceSubProduct'] ?></td>
                        <td><?= $value['QuantitySubOrderSubProduct'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageSubProduct'] ?>' alt=''>
                        </td>
                        <td><?= $value['NameSize'] ?></td>
                        <td><?= $value['Note'] ?></td>
                        <td><?= select($value['StatusOrders'], $StatusOrders) ?></td>
                    </tr>
            <?php endforeach;
            } ?>
        </table>
        <button id="printOrder">In Order</button>
    </article>
</section>
<script src="<?= $_ENV["javaScript"] ?>ListOrderDetails.js"></script>
<?php
include_once $_ENV['admin_Footer_Path'];
?>