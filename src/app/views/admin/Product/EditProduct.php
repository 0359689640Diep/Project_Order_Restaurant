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

?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Thêm sách sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/product/edit?id=<?= $_GET['id'] ?>" method="post" class="contentMain" enctype="multipart/form-data">

        <article class="contentMain_item">
            <input name="NameProduct" placeholder="Tên sản phẩm" value="<?= $dataProduct[0]['NameProduct'] ?>" type="text">
            <input name="QuantityProduct" placeholder="Số lượng" value="<?= $dataProduct[0]['QuantityProduct'] ?>" type="number" min=0>
            <article class="img">
                <img id="previewImage" alt="img" src="<?= $_ENV["imgUpload"] . $dataProduct[0]['ImageProduct'] ?>">
                <input id="fileInput" onchange="previewFile()" name="ImageProduct" type="file">
                <input type="hidden" name="ImageProducts" value="<?= $dataProduct[0]['ImageProduct'] ?>">
            </article>
            <textarea name="ProductDetails" placeholder="Thông tin sản phẩm" title="Không được để trống"><?= $dataProduct[0]['ProductDetails'] ?></textarea>

        </article>
        <article class="contentMain_item">
            <textarea name="ProductDescription" placeholder="Mô tả sản phẩm" title="Không được để trống"><?= $dataProduct[0]['ProductDescription'] ?></textarea>

            <select name="StatusProduct" id="">
                <?php
                $status = "";
                switch ($dataProduct[0]['StatusProduct']) {
                    case 0:
                        $status = "Đang bán";
                        break;
                    case 1:
                        $status = "Ngừng bán";
                        break;
                    case 2:
                        $status = "Hạn chế bán";
                        break;
                    case 3:
                        $status = "Đẩy mạnh bán sản phẩm";
                        break;
                    case 4:
                        $status = "Đang SEO";
                        break;
                }
                ?>
                <option value="<?= $dataProduct[0]['StatusProduct'] ?>"><?= $status ?></option>
                <option value="0">Đang bán</option>
                <option value="1">Ngừng bán</option>
                <option value="2">Hạn chế bán</option>
                <option value="3">Đẩy mạnh bán sản phẩm</option>
                <option value="4">Đang SEO</option>
            </select>
            <select name="IdCategory" id="">
                <option value="<?= $dataProduct[0]['IdCategory'] ?>"><?= $dataProduct[0]['NameCategory'] ?></option>
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
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>