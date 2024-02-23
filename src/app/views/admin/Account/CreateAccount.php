<?php

use App\src\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
if (isset($message) && !empty($message)) {

    if ($message === true) {
        new Notification("Thêm sản phẩm thành công");
    } else {
        new Notification($message);
    }
}
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Thêm tài khoản</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/account/create" method="post" class="contentMain" enctype="multipart/form-data">
        <article class="contentMain_item">
            <input required name="NameAccount" placeholder="Tên tài khoản" title="Không được để trống" type="text">
            <input required name="Gmail" placeholder="Gmail " title="Không được để trống" type="gmail">
            <input required name="ImageAccounts" placeholder="" title="Không được để trống" type="file">
            <input required name="Password" placeholder="Mật khẩu" title="Không được để trống" type="password">

        </article>
        <article class="contentMain_item">
            <select required name="Gender">
                <option selected value="">Giới tính</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
                <option value="2">Khác</option>
            </select>
            <select required name="Role">
                <option selected value="">Chức vụ</option>
                <option value="NVTN">Nhân viên thu ngân</option>
                <option value="NVPVB">Nhân viên phục vụ bàn</option>
                <option value="QL">Quản lý</option>
                <option value="KH">Khách Hàng</option>
                <option value="admin">Chủ quán</option>
            </select>
            <select required name="StatusAccount">
                <option selected value="">Trạng thái</option>
                <option value="0">Hoạt động</option>
                <option value="1">Đã xóa</option>
            </select>
            <button type="submit">Thêm sản phẩm</button>
        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>