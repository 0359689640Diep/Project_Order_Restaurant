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
        <h1>Thêm sách sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/subproduct/create" method="post" class="contentMain" enctype="multipart/form-data">
        <article class="contentMain_item">
            <input name="NameSubProduct" placeholder="Tên sản phẩm" title="Không được để trống" required type="text">
            <input name="PriceSubProduct" placeholder="Giá sản phẩm" title="Không được để trống" required type="number" min=0>
            <input name="QuantilySubProduct" placeholder="Số lượng sản phẩm" title="Không được để trống" required type="number" min=0>
            <input name="ImageSubProduct" required title="Không được để trống" required type="file">

        </article>
        <article class="contentMain_item">
            <select name="StatusSubProduct" id="">
                <option value="">Trạng thái sản phẩm</option>
                <option value="0">Đang bán</option>
                <option value="1">Ngừng bán</option>
                <option value="2">Hạn chế bán</option>
                <option value="3">Đẩy mạnh bán sản phẩm</option>
                <option value="4">Đang SEO</option>
            </select>
            <select name="IdProduct" id="">
                <option value="">Danh sản phẩm chính</option>
                <?php foreach ($dataProduct as $value) : ?>
                    <option value="<?= $value['IdProduct'] ?>"><?= $value['NameProduct'] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit">Thêm sản phẩm</button>
        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>