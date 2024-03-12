<?php

use App\src\assets\global\Notification;

include_once $_ENV["header_Path"];
if (isset($message) && !empty($message)) {
    new Notification($message);
}

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Comment.css">
<div class="BillPayment">
    <div class="layer"></div>
    <h1 id="title">Bình luận sản phẩm</h1>
    <section class="container">

        <?php include_once $_ENV["SideBar_Path"];  ?>
        <div class="content_BillPayment">
            <table>
                <tbody>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Bàn</th>
                        <th>Nội dung</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    foreach ($dataComment as  $value) : ?>
                    <form action="<?= $_ENV['baseUrl'] ?>comment?id=<?= $value['IdSubOrders'] ?>" method="POST">
                        <tr>
                            <td> <?= $value['NameProduct'] ?></td>
                            <td> <img src="<?= $_ENV['imgUpload'] .   $value['ImageProduct'] ?>" alt="img"></td>
                            <td> <?= $value['NumberTables'] ?></td>
                            <td> <input autofocus type="text"
                                    value=" <?= !empty($value['Comment']) ? $value['Comment']   : ""?>" name="Comment">
                            </td>
                            <td> <button type="submit">Cập nhật</button></td>
                        </tr>
                    </form>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="<?= $_ENV['javaScript'] ?>Bill.js"></script>