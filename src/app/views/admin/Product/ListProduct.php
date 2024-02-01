<?php
include_once $_ENV['admin_Header_Path'];
include_once $_ENV['admin_SideBar_Path'];
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
            // test($dataProduct);
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
                <td><?= $_ENV['basePath'] ?></td>
                <td>
                    <a href='<?= $_ENV['basePath'].$value['IdProduct'] ?>'><button>Xóa</button></a>
                    <a href='<?= $_ENV['basePath'].$value['IdProduct'] ?>'><button>Sửa</button></a>
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