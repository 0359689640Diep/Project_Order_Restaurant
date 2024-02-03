<?php

use App\public\assets\global\Notification;

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
        <h1>Thêm sách sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/product/create" method="post" class="contentMain"
        enctype="multipart/form-data">
        <article class="contentMain_item">
            <input name="NameProduct" placeholder="Tên sản phẩm" title="Không được để trống" type="text">
            <input name="QuantityProduct" placeholder="Số lượng" title="Không được để trống" type="number" min=0>
            <input name="ImageProduct" placeholder="" title="Không được để trống" type="file">
            <textarea name="ProductDetails" placeholder="Thông tin sản phẩm" title="Không được để trống"></textarea>

        </article>
        <article class="contentMain_item">
            <textarea name="ProductDescription" placeholder="Mô tả sản phẩm" title="Không được để trống"></textarea>

            <select name="StatusProduct" id="">
                <option value="">Trạng thái sản phẩm</option>
                <option value="0">Đang bán</option>
                <option value="1">Ngừng bán</option>
                <option value="2">Hạn chế bán</option>
                <option value="3">Đẩy mạnh bán sản phẩm</option>
                <option value="4">Đang SEO</option>
            </select>
            <select name="IdCategory" id="">
                <option value="">Danh mục sản phẩm</option>
                <?php foreach ($dataCategory as $value) : ?>
                <option value="<?= $value['IdCategory'] ?>"><?= $value['NameCategory'] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit">Thêm sản phẩm</button>
        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>