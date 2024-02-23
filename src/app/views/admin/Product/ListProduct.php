<?php

use App\src\assets\global\Notification;

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
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Chi tiết</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php
            if (isset($dataProduct) && !empty($dataProduct)) {
                foreach ($dataProduct as $value) : ?>
                    <tr>
                        <td><?= $value['NameProduct'] ?></td>
                        <td><?= $value['QuantityProduct'] ?></td>
                        <td><?= $value['NameCategory'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageProduct'] ?>' alt=''>
                        </td>
                        <td><?= $value['ProductDetails'] ?></td>
                        <td><?= $value['ProductDescription'] ?></td>
                        <?php
                        $status = "";
                        switch ($value['StatusProduct']) {
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
                        <td><?= $status ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/product/delete?id=<?= $value['IdProduct'] ?>'>
                                <button>Xóa</button>
                            </a>
                            <a href='<?= $_ENV['basePath'] ?>admin/product/edit?id=<?= $value['IdProduct'] ?>'>
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