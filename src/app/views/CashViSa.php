<link rel="stylesheet" href="<?=$userStyle?>/CashViSa.css">
<form action="" method="post" class="page">
    <section class="bill">
        <section class="containerBill">
            <article class="headerBill">
                <h1>Danh sách mua sắm</h1>
            </article>
            <section class="contentBill">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                    <?php 
                    if(isset($listOrderUser) && !empty($listOrderUser)){
                        foreach($listOrderUser as $dataListOrderUser){
                            echo "
                            <tr>
                                <td>
                                    <img src='../assets/img/admin/{$dataListOrderUser['ImageProduct']}' alt=''>    
                                    {$dataListOrderUser['NameProduct']}
                                </td>
                                <td>{$dataListOrderUser['QuantityCard']}</td>
                                <td>{$dataListOrderUser['PriceProduct']}VND</td>
                            </tr>
                            
                            ";
                        }

                    }else{
                        echo "<h1>Không có sản phẩm nào</h1>";
                    }
                    ?>
                </table>
            </section>
            <article class="footerBill">
                <?php 
                    if(isset($listOrderUser) && !empty($listOrderUser)){
                        $_SESSION['totailPrice'] = cart_Totail($listOrderUser)['totail'];
                ?>
                <article class="itemFooterBill">
                    <h3>Phí dịch vụ 1%: </h3>
                    <h1><?= cart_Totail($listOrderUser)['ServiceCharge'] ?>VND</h1>
                </article>
                <article class="itemFooterBill">
                    <h3>VAT 10%: </h3>
                    <h1><?= cart_Totail($listOrderUser)['vat'] ?>VND</h1>
                </article>
                <article class="itemFooterBill">
                    <h3>Tổng: </h3>
                    <h1 ><?= cart_Totail($listOrderUser)['totail'] ?>VND</h1>
                </article>
            <?php }else{
                echo "<h1>Không có sản phẩm nào</h1>";
            } ?> 
            </article>
        </section>
        <button type="submit" name="payUrl">Thanh toán MoMo</button>
    </section>
</form>