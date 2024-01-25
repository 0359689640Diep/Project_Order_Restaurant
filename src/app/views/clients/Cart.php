<?php
include_once $_ENV['header_Path'];
// test($dataCart);

?>
<link rel="stylesheet" href="<?= $_ENV["userStyle"] ?>Cart.css">

<form action="OnlineController.php?act=GioHang" method="post" class="page" id="formCart">
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
                        <th>Chức năng</th>
                    </tr>

                    <?php
                    foreach ($dataCart as $valuesCart) {
                        echo "
                        <tr>
                            <td><input type='checkbox'  class='rowCheckbox' data-quantity-id='{$valuesCart['IdCart']}'></td>
                            <td><img src='$_ENV[imgUpload]{$valuesCart['ImageSize']}' alt='img'></td>
                            <td>{$valuesCart['NameProduct']}</td>
                            <td>{$valuesCart['SizeDefault']}</td>
                            <td>{$valuesCart['PriceSize']}</td>
                            <td>
                                <input type='number' 
                                        name='quantity[{$valuesCart['IdCart']}]'
                                        min=1 max={$valuesCart['QuantityProduct']}' 
                                        value='{$valuesCart['QuantityCardProduct']}' 
                                        id='quantity{$valuesCart['IdCart']}'>
                            </td>
                            <td>
                                <a href='$_ENV[basePath]cart?delete={$valuesCart['IdCart']}'>
                                    <i class='ti-trash'></i>
                                </a>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
            </section>
        </section>
        <aside>
            <section class="mainAside">
                <h1>Thông tin đơn hàng</h1>
                <ul>
                    <li>Tổng tiền <?= "qualityProduct" ?> sản phẩm: <?= "totailPrice" ?> VND</li>
                    <li>Phí dịch vụ 1% : <?= "ServiceCharge" ?> VND</li>
                    <li>Thuế VAT 10% : <?= "vat" ?> VND</li>
                </ul>
            </section>
            <section class="footerAside">
                <h1>Tổng cộng: <?= "totail" ?> VND</h1>
                <button type="submit" name="ThanhToan">Chọn Bàn</button>
            </section>
        </aside>
    </main>
    </section>
    <?php
    include_once $_ENV['footer_Path'];
    ?>
    <script src="<?= $_ENV['javaScript'] ?>Cart.js"></script>