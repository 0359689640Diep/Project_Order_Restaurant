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
        <h1>Sửa kích cỡ </h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/size/edit?IdSizeDefault=<?= $_GET['IdSizeDefault'] ?>&IdSize=<?= $_GET['IdSize'] ?>" method="post" class="contentMain" enctype="multipart/form-data">

        <article class="contentMain_item">
            <input name="SizeDefault" placeholder="Tên kích cỡ" value="<?= $dataSizeDefault[0]['SizeDefault'] ?>" type="text">
            <input name="PriceSize" placeholder="Giá kích cỡ" value="<?= $dataSize[0]['PriceSize'] ?>" type="number" min=0>
            <input name="SEO" placeholder="Phần trăm SE0" value="<?= $dataSize[0]['SEO'] ?>" type="number" min=0>

        </article>
        <article class="contentMain_item">
            <article class="img">
                <img id="previewImage" alt="img" src="<?= $_ENV["imgUpload"] . $dataSize[0]['ImageSize'] ?>">
                <input id="fileInput" onchange="previewFile()" name="ImageSize" type="file">
                <input type="hidden" name="ImageSizeOld" value="<?= $dataSize[0]['ImageSize'] ?>">
            </article>
            <select name="StatusSize" id="">
                <?php $status = select($dataSizeDefault[0]['StatusSize'], [0 => "Đang bán", 1 => "Ngừng bán"]); ?>
                <option value="<?= $dataSizeDefault[0]['StatusSize'] ?>"><?= $status ?></option>
                <option value="0">Đang bán</option>
                <option value="1">Ngừng bán</option>
            </select>
            <select name="IdProduct" id="">
                <option value="<?= $dataSize[0]['IdProduct'] ?>"><?= $dataSize[0]['NameProduct'] ?></option>
                <?php foreach ($dataProduct as $value) : ?>
                    <option value="<?= $value['IdProduct'] ?>"><?= $value['NameProduct'] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit">Sửa kích cỡ</button>
        </article>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>