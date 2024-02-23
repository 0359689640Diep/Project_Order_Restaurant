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
                <th>Số bàn</th>
                <th>Số người mặc định</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php

            if (isset($dataTables) && !empty($dataTables)) {

                $StatusTable = [
                    "0" => "Đã xóa",
                    "1" => "Bàn trống",
                    "2" => "Bàn đã sử dụng",
                    "3" => "Khách đặt bàn trước",
                    "4" => "Khách đặt đồ ăn trước",
                    "5" => "Khách gọi nhân viên"
                ];
                foreach ($dataTables as $value) : ?>
                    <tr>
                        <td><?= $value['NumberTable'] ?></td>
                        <td><?= $value['NumberPeopleDefault'] ?></td>
                        <td><?= select($value['StatusTable'], $StatusTable) ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/table/delete?id=<?= $value['IdTables'] ?>'>
                                <button>Xóa</button>
                            </a>
                            <a href='<?= $_ENV['basePath'] ?>admin/table/edit?id=<?= $value['IdTables'] ?>'>
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