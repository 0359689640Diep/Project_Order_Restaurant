<?php

use App\public\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
if (isset($message) && !empty($message)) {

    if ($message === true) {
        new Notification("Cập nhật sản phẩm thành công");
    } else {
        new Notification($message);
    }
}
$Gender = ["0" => "Nam", "1" => 'Nữ', "2" => "Khác"];
$Role = ["NVTN" =>  "Nhân viên thu ngân", "NVPVB" =>  "Nhân viên phục vụ bàn", "QL" =>  "Quản lý", "KH" =>  "Khách Hàng", "CQ" =>  "Chủ quán"];
$StatusAccount = ["0" => "Hoạt động", "1" => "Đã xóa"];
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Sửa tài khoản</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/account/edit?id=<?= $_GET['id'] ?>" method="post" class="contentMain" enctype="multipart/form-data">
        <article class="contentMain_item">

            <input name="NameAccount" placeholder="Tên sản tài khoản" value="<?= $dataAccount[0]['NameAccount'] ?>" type="text">

            <input name="Gmail" placeholder="Gmail" value="<?= $dataAccount[0]['Gmail'] ?>" type="gmail" min=0>

            <input name="Password" placeholder="Mật khẩu" value="<?= $dataAccount[0]['Password'] ?>" type="password">

            <article class="img">
                <img id="previewImage" alt="img" src="<?= $_ENV["imgUpload"] . $dataAccount[0]['ImageAccounts'] ?>">
                <input id="fileInput" onchange="previewFile()" name="ImageAccounts" type="file">
                <input type="hidden" name="ImageAccountsOld" value="<?= $dataAccount[0]['ImageAccounts'] ?>">
            </article>

        </article>
        <article class="contentMain_item">

            <select name="Gender">
                <option selected value="<?= $dataAccount[0]['Gender'] ?>">
                    <?= select($dataAccount[0]['Gender'], $Gender) ?>
                </option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
                <option value="2">Khác</option>
            </select>
            <select name="Role">
                <option selected value="<?= $dataAccount[0]['Role'] ?>"><?= select($dataAccount[0]['Role'], $Role) ?>
                </option>
                <option value="NVTN">Nhân viên thu ngân</option>
                <option value="NVPVB">Nhân viên phục vụ bàn</option>
                <option value="QL">Quản lý</option>
                <option value="KH">Khách Hàng</option>
                <option value="CQ">Chủ quán</option>
            </select>
            <select name="StatusAccount">
                <option selected value="<?= $dataAccount[0]['StatusAccount'] ?>">
                    <?= select($dataAccount[0]['StatusAccount'], $StatusAccount) ?>
                </option>
                <option value="0">Hoạt động</option>
                <option value="1">Đã xóa</option>
            </select>
            <button type="submit">Sửa tài khoản</button>

        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>