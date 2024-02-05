<?php

use App\public\assets\global\Notification;

include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];

if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Product/ListProduct.css">
<section class="containerMain">
    <article class="titleMain">
        <h1>Danh sách sản phẩm</h1>
    </article>
    <article class="contentMain">
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Sản phẩm chính</th>
                <th>Ảnh sản phẩm chính</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php
            if (isset($dataSubProduct) && !empty($dataSubProduct)) {
                foreach ($dataSubProduct as $value) : ?>
            <tr>
                <td><?= $value['NameSubProduct'] ?></td>
                <td><?= $value['QuantilySubProduct'] ?></td>
                <td>
                    <img src='<?= $_ENV['imgUpload'] . $value['ImageSubProduct'] ?>' alt='image'>
                </td>
                <td><?= $value['PriceSubProduct'] ?></td>
                <td><?= $value['NameProduct'] ?></td>
                <td>
                    <img src='<?= $_ENV['imgUpload'] . $value['ImageProduct'] ?>' alt='image'>
                </td>
                <?php
                        $status = "";
                        switch ($value['StatusSubProduct']) {
                            case 0:
                                $status = "Đang bán";
                                break;
                            case 1:
                                $status = "Ngừng bán";
                                break;
                        }
                        ?>
                <td><?= $status ?></td>
                <td>
                    <a href='<?= $_ENV['basePath'] ?>admin/subproduct/delete?id=<?= $value['IdSubProduct'] ?>'>
                        <button>Xóa</button>
                    </a>
                    <a href='<?= $_ENV['basePath'] ?>admin/subproduct/edit?id=<?= $value['IdSubProduct'] ?>'>
                        <button>Sửa</button>
                    </a>
                </td>
            </tr>
            <?php endforeach;
            } ?>
        </table>
    </article>
</section>
<?php
include_once $_ENV['admin_Footer_Path'];
?>