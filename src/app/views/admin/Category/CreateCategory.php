<?php

use App\src\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Thêm danh mục sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/category/create" method="post" class="contentMain" style="justify-content: center">
        <article class="contentMain_item">

            <input required name="NameCategory" placeholder="Tên danh mục" title="Không được để trống" type="text">

            <select name="StatusCategory">
                <option selected value=""> Trạng thái danh mục</option>
                <option value="0">Hoạt động</option>
                <option value="1">Ngừng hoạt động</option>
            </select>
            <button type="submit">Thêm danh mục </button>
        </article>

</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>