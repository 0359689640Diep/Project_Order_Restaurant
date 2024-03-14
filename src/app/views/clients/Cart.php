<?php

use App\src\assets\global\Notification;

include_once $_ENV["header_Path"];
if (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Cart.css">
<form action="<?= $_ENV["basePath"] ?>cart" method="post" class="page" id="formCart">
    <section class="headerProduct">
        <h1>Giỏ hàng</h1>
    </section>
    <main>

        <section class="containerMain">
            <section class="listProduct">
                <table>
                    <tr>
                        <th><input type="checkbox" name="" id="checkAll"></th>
                        <th>Ảnh </th>
                        <th>Tên </th>
                        <th>Kích cỡ</th>
                        <th>Giá</th>
                        <th>Số lượng </th>
                        <th>Ghi chú</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php
                    foreach ($dataCart as $valuesCart) : ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="IdSubCart[]" value=<?= $valuesCart["IdSubCart"] ?>
                                class="rowCheckbox" data-quantity-id="<?= $valuesCart["IdSubCart"] ?>">
                        </td>
                        <td><img src="<?= $_ENV["imgUpload"] . $valuesCart["ImageSize"] ?>" alt="img"></td>
                        <td> <?= $valuesCart["NameProduct"] ?> </td>
                        <td> <?= $valuesCart["SizeDefault"] ?> </td>
                        <td> <?= $valuesCart["PriceSize"] ?> </td>
                        <td>
                            <input type="number" name="quantity[<?= $valuesCart["IdSubCart"] ?>]" min="1"
                                max=<?= $valuesCart["QuantityProduct"] ?>
                                value="<?= $valuesCart['QuantityCardProduct'] ?>"
                                id="quantity<?= $valuesCart['IdSubCart'] ?>">
                        </td>
                        <td>
                            <input type="text" autofocus name="note[<?= $valuesCart["IdSubCart"] ?>]"
                                id="note<?= $valuesCart['IdSubCart'] ?>" value="<?= $valuesCart['Note'] ?>">
                        </td>
                        <td>
                            <a href=" <?= $_ENV['basePath'] . 'cart?delete=' . $valuesCart['IdSubCart'] ?>">
                                <i class="ti-trash"></i>
                            </a>
                            <a
                                href="<?= $_ENV['basePath'] . 'getSubProduct?IdProduct=' . $valuesCart['IdProduct'] . '&IdSubCart=' . $valuesCart['IdSubCart'] ?>">
                                <i class="ti-pencil-alt"></i>
                            </a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </section>
    </main>

    <aside>
        <section class="mainAside">
            <ul>
                <li>Số lượng món ăn: <?= $bill["QualityProduct"] ?> Món</li>
                <li>Số lượng các món ăn phụ: <?= $bill["QualitySubProduct"] ?> Món</li>
                <li>Thuế VAT 10% : <?= $bill["VAT"] ?> VND</li>
                <li>Phí dịch vụ 1% : <?= $bill["ServiceCharge"] ?> VND</li>
                <li>Tổng giá các món ăn phụ theo yêu cầu : <?= $bill["PriceSubProduct"] ?> VND</li>
                <li>Tổng tiền trước thuế và trước phí dị vụ : <?= $bill["totailPrice"] ?> VND</li>
            </ul>
        </section>
        <section class="footerAside">
            <h1>Giá phải trả: <?= $bill["PayThePrice"] ?> VND</h1>
            <button id="submit" type="submit" name="SelectTable" disabled>Chọn Bàn</button>
        </section>
    </aside>
</form>

<script src="<?= $_ENV["javaScript"] ?>Cart.js"></script>