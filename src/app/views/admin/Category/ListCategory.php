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
        <h1>Danh sách bàn</h1>
    </article>
    <article class="contentMain">
        <table>
            <tr>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php

            if (isset($dataCategory) && !empty($dataCategory)) {

                $StatusCategory = [
                    "0" => "Hoạt động",
                    "1" => "Ngừng hoạt động"
                ];
                foreach ($dataCategory as $value) : ?>
                    <tr>
                        <td><?= $value['NameCategory'] ?></td>
                        <td><?= select($value['StatusCategory'], $StatusCategory) ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/category/delete?id=<?= $value['IdCategory'] ?>'>
                                <button>Xóa</button>
                            </a>
                            <a href='<?= $_ENV['basePath'] ?>admin/category/edit?id=<?= $value['IdCategory'] ?>'>
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