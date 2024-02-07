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
                <th>Tên tài khoản</th>
                <th>Gmail</th>
                <th>Giới tính</th>
                <th>Ảnh</th>
                <th>Mật khẩu</th>
                <th>Chức vụ</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
            <?php
            if (isset($accountData) && !empty($accountData)) {

                $Gender = ["0" => "Nam", "1" => 'Nữ', "2" => "Khác"];
                $Role = ["NVTN" =>  "Nhân viên thu ngân", "NVPVB" =>  "Nhân viên phục vụ bàn", "QL" =>  "Quản lý", "KH" =>  "Khách Hàng", "CQ" =>  "Chủ quán"];
                $StatusAccount = ["0" => "Hoạt động", "1" => "Đã xóa"];

                foreach ($accountData as $value) : ?>
                    <tr>
                        <td><?= $value['NameAccount'] ?></td>
                        <td><?= $value['Gmail'] ?></td>
                        <td><?= select($value['Gender'], $Gender) ?></td>
                        <td>
                            <img src='<?= $_ENV['imgUpload'] . $value['ImageAccounts'] ?>' alt=''>
                        </td>
                        <td><?= $value['Password'] ?></td>
                        <td><?= select($value['Role'], $Role) ?></td>
                        <td><?= select($value['StatusAccount'], $StatusAccount) ?></td>
                        <td>
                            <a href='<?= $_ENV['basePath'] ?>admin/account/delete?id=<?= $value['IdAccount'] ?>'>
                                <button>Xóa</button>
                            </a>
                            <a href='<?= $_ENV['basePath'] ?>admin/account/edit?id=<?= $value['IdAccount'] ?>'>
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