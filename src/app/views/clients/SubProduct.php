<?php

use App\src\assets\global\Notification;

include_once $_ENV['header_Path'];
if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Cart.css">
<form action="<?= $_ENV["basePath"] ?>cart?IdSubCart=<?= $_GET['IdSubCart'] ?>" method="post" class="page" id="formCart">
    <section class="headerProduct">
        <h1>Các món ăn đi kèm với sản phẩm của bạn</h1>
    </section>
    <main>
        <section class="containerMain">
            <section class="listProduct">
                <table>
                    <tr>
                        <th><input type="checkbox" name="" id="checkAll"></th>
                        <th>Ảnh </th>
                        <th>Tên </th>
                        <th>Giá</th>
                        <th>Số lượng </th>
                    </tr>
                    <?php
                    foreach ($dataSubProduct as $valuesSubProduct) {
                        echo "
                        <tr>
                            <td>
                                <input type='checkbox' 
                                name='IdSubProduct' 
                                class='rowCheckbox' 
                                value='$valuesSubProduct[IdSubProduct]'
                                data-quantity-id='{$valuesSubProduct['IdSubProduct']}'>
                            </td>
                            <td><img src='$_ENV[imgUpload]{$valuesSubProduct['ImageSubProduct']}' alt='img'></td>
                            <td>{$valuesSubProduct['NameSubProduct']}</td>
                            <td>{$valuesSubProduct['PriceSubProduct']}</td>
                            <td>
                                <input type='number' 
                                        name='quantity'
                                        min=0 max={$valuesSubProduct['QuantilySubProduct']}' 
                                        value='1' 
                                        id='quantity{$valuesSubProduct['IdSubProduct']}'>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
            </section>
        </section>
    </main>
    <aside>
        <section class="mainAside">
            <ul>
                <li>Số lượng món ăn: <?= $bill['QualityProduct'] ?> Món</li>
                <li>Số lượng các món ăn phụ: <?= $bill['QualitySubProduct'] ?> Món</li>
                <li>Thuế VAT 10% : <?= $bill['VAT'] ?> VND</li>
                <li>Phí dịch vụ 1% : <?= $bill['ServiceCharge'] ?> VND</li>
                <li>Tổng giá các món ăn phụ theo yêu cầu : <?= $bill['PriceSubProduct'] ?> VND</li>
                <li>Tổng tiền trước thuế và trước phí dị vụ : <?= $bill['totailPrice'] ?> VND</li>
            </ul>
        </section>
        <section class="footerAside">
            <h1>Giá phải trả: <?= $bill['PayThePrice'] ?> VND</h1>
            <button id="submit" type="submit" name="SubProduct" disabled>Thêm vào giỏ hàng</button>
        </section>
    </aside>
</form>

<script src="<?= $_ENV['javaScript'] ?>Cart.js"></script>