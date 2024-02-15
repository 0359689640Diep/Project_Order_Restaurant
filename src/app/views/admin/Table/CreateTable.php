<?php

use App\public\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Thêm tài khoản</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/table/create" method="post" class="contentMain"
        style="justify-content: center">
        <article class="contentMain_item">

            <input required name="NumberTable" placeholder="Số bàn" title="Không được để trống" type="number">
            <input required name="NumberPeopleDefault" placeholder="Số người mặc định " title="Không được để trống"
                type="number">

            <select name="StatusTable">
                <option selected value=""> Trạng thái bàn</option>
                <option value="0">Đã xóa</option>
                <option value="1">Bàn trống</option>
                <option value="2">Bàn đã sử dụng</option>
                <option value="3">Khách đặt bàn trước</option>
                <option value="4">Khách đặt đồ ăn trước</option>
                <option value="5">Khách gọi nhân viên</option>

            </select>
            <button type="submit">Thêm bàn</button>
        </article>

</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>