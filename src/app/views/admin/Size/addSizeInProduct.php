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
        <h1>Thêm kích cỡ vào sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/size/addSizeInProduct" method="post" class="contentMain" enctype="multipart/form-data">

        <article class="contentMain_item">

            <input required name="PriceSize" placeholder="Giá cho từng kích thước" title="Không được để trống" type="number" min=0>
            <input name="SEO" placeholder="SEO cho từng kích thước" title="Không được để trống" type="number" min=0>
            <input required name="ImageSize" placeholder="" title="Không được để trống" type="file">

        </article>
        <article class="contentMain_item">

            <select name="IdSizeDefault">
                <option value="">Kích cỡ mặc định</option>
                <?php foreach ($dataSizeDefault as $value) : ?>
                    <option value="<?= $value['IdSizeDefault'] ?>"><?= $value['SizeDefault'] ?></option>
                <?php endforeach ?>
            </select>
            <select name="IdProduct">
                <option value="">Sản phẩm đi kèm kích cỡ</option>
                <?php foreach ($dataProduct as $value) : ?>
                    <option value="<?= $value['IdProduct'] ?>"><?= $value['NameProduct'] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit">Thêm kích cỡ</button>
        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>