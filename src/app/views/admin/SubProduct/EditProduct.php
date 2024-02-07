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

?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Thêm sách sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/subproduct/edit?id=<?= $_GET['id'] ?>" method="post" class="contentMain"
        enctype="multipart/form-data">
        <article class="contentMain_item">
            <input name="NameSubProduct" placeholder="Tên sản phẩm" value="<?= $dataSubProduct[0]['NameProduct'] ?>"
                type="text">
            <article class="img">
                <img id="previewImage" alt="img"
                    src="<?= $_ENV["imgUpload"] . $dataSubProduct[0]['ImageSubProduct'] ?>">
                <input id="fileInput" onchange="previewFile()" name="ImageSubProduct" type="file">
                <input type="hidden" name="ImageSubProducts" value="<?= $dataSubProduct[0]['ImageSubProduct'] ?>">
            </article>
            <input name="QuantilySubProduct" placeholder="Số lượng sản phẩm" title="Không được để trống"
                value="<?= $dataSubProduct[0]['QuantilySubProduct'] ?>" type="text">

        </article>
        <article class="contentMain_item">

            <input name="PriceSubProduct" placeholder="Số lượng sản phẩm" title="Không được để trống"
                value="<?= $dataSubProduct[0]['PriceSubProduct'] ?>" type="text">

            <select name="StatusSubProduct" id="">
                <?php
                $status = "";
                switch ($dataSubProduct[0]['StatusSubProduct']) {
                    case 0:
                        $status = "Đang bán";
                        break;
                    case 1:
                        $status = "Ngừng bán";
                        break;
                }
                ?>
                <option value="<?= $dataSubProduct[0]['StatusSubProduct'] ?>"><?= $status ?></option>
                <option value="0">Đang bán</option>
                <option value="1">Ngừng bán</option>
            </select>
            <select name="IdProduct" id="">
                <option value="<?= $dataSubProduct[0]['IdProduct'] ?>"><?= $dataSubProduct[0]['NameProduct'] ?>
                </option>

                <?php
                foreach ($dataProduct as $value) : ?>
                <option value="<?= $value['IdProduct'] ?>"><?= $value['NameProduct'] ?></option>
                <?php endforeach ?>
            </select>

            <button type="submit">Thêm sản phẩm</button>
        </article>
    </form>
</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>