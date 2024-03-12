<?php
include_once $_ENV['header_Path'];
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>MethodOnline.css">
<form action="" method="post" class="page">
    <section class="bill">
        <section class="containerBill">
            <article class="headerBill">
                <h1>Danh sách mua sắm</h1>
            </article>
            <section class="contentBill">
                <table>
                    <tr>
                        <th>Tên SP</th>
                        <th>Ảnh SP</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Kích cỡ</th>
                        <th>Tên SP phụ</th>
                        <th>Ảnh SP phụ</th>
                        <th>Số lượng </th>
                    </tr>

                    <?php
                    foreach ($dataCart as $dataListOrderUser) {
                        echo "
                            <tr>
                                <td>{$dataListOrderUser['NameProduct']}</td>
                                <td><img src='{$_ENV['imgUpload']}{$dataListOrderUser['ImageSize']}' alt='img'></td>
                                <td>{$dataListOrderUser['QuantityCardProduct']}</td>
                                <td>{$dataListOrderUser['PriceSize']}VND</td>
                                <td>{$dataListOrderUser['SizeDefault']}</td>
                                <td>{$dataListOrderUser['NameSubProduct']}</td>
                                <td><img src='{$_ENV['imgUpload']}{$dataListOrderUser['ImageSubProduct']}' alt='img'></td>
                                <td>{$dataListOrderUser['QuantitySubCardProduct']}</td>
                            </tr>";
                    }
                    ?>
                </table>
            </section>
            <section class="footerBill">
                <article class="itemFooterBill">
                    <h3>Số bàn: <?= $dataTables["NumberTable"] ?> </h3>
                    <h3>Giờ hẹn: <?= $dataTables["timeBooking"] ?> </h3>
                    <h3>Số lượng người: <?= $dataTables["NumberInPeople"] ?> </h3>
                    <h3>Phí dịch vụ 1%: <?= $Bill["ServiceCharge"] ?> VND</h3>
                    <h3>VAT 10%: <?= $Bill["VAT"] ?> VND</h3>
                    <h3>Tiền trước thuế, phí dịch vụ: <?= $Bill["totailPrice"] ?> VND</h3>
                    <h3>Phải trả: <?= $Bill["PayThePrice"] ?> VND</h3>
                </article>
                <article class="button">
                    <button type="submit" name="payUrl">Thanh toán</button>

                </article>
            </section>
        </section>
</form>