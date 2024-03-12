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
        <h1>Danh sách bàn</h1>
    </article>
    <article class="contentMain">
        <table>
            <tr>
                <th>Nội Dung</th>
                <th>Tên khách hàng</th>
                <th>Số bàn đã ngồi</th>
                <th>Gmail </th>
                <th>Ảnh khách hàng</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php

            if (isset($dataComment) && !empty($dataComment)) {

                $StatusComment = [
                    "1" => "Hoạt động",
                    "2" => "Ẩn",
                ];
                foreach ($dataComment as $value) : ?>
            <tr>
                <td><?= $value['Comment'] ?></td>
                <td><?= $value['NameAccount'] ?></td>
                <td><?= $value['NumberTables'] ?></td>
                <td><?= $value['Gmail'] ?></td>
                <td>
                    <img src='<?= $_ENV['imgUpload'] . $value['ImageAccounts'] ?>' alt=''>
                </td>
                <td><?= select($value['StatusOrders'], $StatusComment) ?></td>
                <td>
                    <a href='<?= $_ENV['basePath'] ?>admin/comment/delete?id=<?= $value['IdSubOrders'] ?>'>
                        <button>Ẩn</button>
                    </a>
                    <a href='<?= $_ENV['basePath'] ?>admin/comment/restore?id=<?= $value['IdSubOrders'] ?>'>
                        <button>Khôi phục</button>
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