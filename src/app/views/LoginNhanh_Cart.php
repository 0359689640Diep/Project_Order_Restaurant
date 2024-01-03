<link rel="stylesheet" href="<?=$userStyle?>/Cart.css">
<form action="<?= $userAction ?>LoginNhanh_ListOrder" method="post" class="page" id="formCart" >
    <main>
        <section class="containerMain">
            <section class="listProduct">
                <table>
                    <tr>
                        <th>Tên </th>
                        <th>Ảnh </th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng </th>
                        <th>Tính Tiền </th>

                    </tr>
                    
                    <?php
                    foreach($arrOrder as $i){
                            $priceOneCart= $i['PriceProduct'] * $i['QuantityOrderPro'] ;
                        echo "
                            <tr>
                                <td><img src='$imgPathAdmin{$i['ImageProduct']}' alt='img'></td>
                                <td>{$i['NameProduct']}</td>
                                <td>{$i['NameSize']}</td>
                                <td>{$i['PriceProduct']}</td>
                                <td>{$i['QuantityOrderPro']}</td>
                                <td>{$priceOneCart}</td>
                                
                            </tr>
                        ";
                    }
                    ?>
                </table>
            </section>
        </section>
        <aside>
            <section class="mainAside">
                <h1>Thanh toán đơn hàng</h1>
                <ul>
                    <li style="color: red;"><?= isset($mes_ChoXacNhan) ? $mes_ChoXacNhan : '' ?></li>

                </ul>
            </section>
            <section class="footerAside">
                <!-- vì các order_pro có cùng 1 orders =>> lấy phần tử đàu tiền -->
                <input type="hidden" name="IdOrder" value="<?= $arrOrder[0]['IdOrder'] ?>">
                <input type="hidden" name="PriceOrders" value="<?= $tienTong ?>">
                <h1>Tổng cộng: <?= $tienTong ?> $</h1>
                <button type="submit" name="Pay_Truc_Tiep" <?= (empty($arrOrder)) ? 'disabled' : '' ?> value="thanhtoan"  >Thanh Toán Trực Tiếp </button>
                <button type="submit" name="Pay_VNPAY">Thanh toán Bằng VN Pay</button>

            </section>
        </aside>
    </main>
    </section>
    <?php 

    if(isset($alert)){
        echo "<script> alert('$alert') </script>";
    }
    ?>
    <script src="../assets/js/Cart.js"></script>
</form>