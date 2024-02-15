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
$StatusCategory = [
    "0" => "Hoạt động",
    "1" => "Ngừng hoạt động"
];

?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/CreateProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Sửa danh mục sản phẩm</h1>
    </article>
    <form action="<?= $_ENV['basePath'] ?>admin/category/edit?id=<?= $_GET['id'] ?>" method="post" class="contentMain" style="justify-content: center">
        <article class="contentMain_item">

            <input name="NameCategory" placeholder="Tên danh mục" value="<?= $dataCategory[0]['NameCategory'] ?>" type="text">

            <select name="StatusCategory">
                <option selected value="<?= $dataCategory[0]['StatusCategory'] ?>">
                    <?= select($dataCategory[0]['StatusCategory'], $StatusCategory) ?>
                </option>
                <option value="0">Hoạt động</option>
                <option value="1">Ngừng hoạt động</option>
            </select>
            <button type="submit">Sửa danh mục</button>

        </article>

</section>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>
<script src="<?= $_ENV['javaScript'] ?>main.js"></script>