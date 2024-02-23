<?php

use App\src\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
if (isset($message) && !empty($message)) {

    if ($message === true) {
        new Notification("Cập nhật sản phẩm thành công");
    } else {
        new Notification($message);
    }
}
$StatusTable = [
    "0" => "Đã xóa",
    "1" => "Bàn trống",
    "2" => "Bàn đã sử dụng",
    "3" => "Khách đặt bàn trước",
    "4" => "Khách đặt đồ ăn trước",
    "5" => "Khách gọi nhân viên"
];

?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Sửa bàn</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/table/edit?id=<?= $_GET['id'] ?>" method="post" class="contentMain" style="justify-content: center">
        <article class="contentMain_item">

            <input name="NumberTable" placeholder="Số bàn" value="<?= $dataTables[0]['NumberTable'] ?>" type="number">

            <input name="NumberPeopleDefault" placeholder="Số người mặc định" value="<?= $dataTables[0]['NumberPeopleDefault'] ?>" type="number">

            <select name="StatusTable">
                <option selected value="<?= $dataTables[0]['StatusTable'] ?>">
                    <?= select($dataTables[0]['StatusTable'], $StatusTable) ?>
                </option>

                <option value="0">Đã xóa</option>
                <option value="1">Bàn trống</option>
                <option value="2">Bàn đã sử dụng</option>
                <option value="3">Khách đặt bàn trước</option>
                <option value="4">Khách đặt đồ ăn trước</option>
                <option value="5">Khách gọi nhân viên</option>

            </select>
            <button type="submit">Sửa bàn</button>

        </article>

</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>