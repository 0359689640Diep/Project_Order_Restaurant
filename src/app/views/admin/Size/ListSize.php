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
        <h1>Danh sách kích cỡ</h1>
    </article>
    <article class="contentMain">
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên kích cỡ</th>
                <th>Giá từng kích cỡ: VND</th>
                <th>SEO(%)</th>
                <th>Ảnh kích cỡ</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php
            if (isset($dataSize) && !empty($dataSize)) {
                foreach ($dataSize as $value) : ?>
                    <tr>
                        <td><?= $value['NameProduct'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageProduct'] ?>' alt=''>
                        </td>
                        <td><?= $value['SizeDefault'] ?></td>
                        <td><?= $value['PriceSize'] ?></td>
                        <td><?= $value['SEO'] ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageSize'] ?>' alt=''>
                        </td>
                        <?php
                        $status = "";
                        $color = "green";
                        switch ($value['StatusSize']) {
                            case 0:
                                $status = "Hoạt động";
                                break;
                            case 1:
                                $status = "Ngừng hoạt động";
                                $color = "red";
                                break;
                        }
                        ?>
                        <td style="color: <?= $color ?>"><?= $status ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/size/delete?id=<?= $value['IdSizeDefault'] ?>'>
                                <button>Xóa</button>
                            </a>
                            <a href='<?= $_ENV['basePath'] ?>admin/size/edit?IdSizeDefault=<?= $value['IdSizeDefault'] ?>&IdSize=<?= $value['IdSize'] ?>'>
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