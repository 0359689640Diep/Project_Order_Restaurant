<link rel="stylesheet" href="../assets/css/user/BillPayment.css">
<div class="BillPayment">
    <div class="layer"></div>
    <h1 id="title">Lịch Sử Thanh Toán</h1>
    <section class="container">
        <section class="asside">
            <section class="headerAsside">
                <article class="img">
                <img src="../assets/img/admin/<?= $dataProfile['ImageAccounts']?>" alt="<?= $dataProfile['ImageAccounts']?>">
                </article>
                <article class="name">
                    <h1> <?= $dataProfile['NameAccount']?> </h1>
                </article>
            </section>
            <section class="mainAside">
                <?php 
                $totailPrice = 0;
                foreach ($listOrderPayMent as $key =>  $valueListOrderPayMent) {
                    $totailPrice += (int)$valueListOrderPayMent['PriceOrders'];
                }
                ?>
                <ul>
                    <li>  Tổng tiền: <?= $totailPrice ?> VND </li>
                    <li> <a href="OnlineController.php?act=PersonalPage">Trang cá nhân</a> <i class="ti-angle-down"></i> </li>
                    <li> <a href="OnlineController.php?act=billthanhtoan">Lịch sử thanh toán</a> <i class="ti-angle-down"></i> </li>
                    <li> <a href="OnlineController.php?act=AddComment">Bình luận sản phẩm</a> <i class="ti-angle-down"></i> </li>
                    <li> <a href="OnlineController.php?act=ListComment">Sản phẩm đã bình luận</a> <i class="ti-angle-down"></i> </li>
                    <li>  Tổng số lượng sản phẩm đã sử dụng: <?= count($listOrderPayMent) ?> </li>
                </ul>
            </section>
        </section>
        <div class="content_BillPayment">
            <table>
                <tbody>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thanh toán</th>
                        <th>Bàn</th>
                        <th>Loại order</th>
                        <th>Thời gian</th>
                    </tr>
                    <?php 
                    foreach ($listOrderPayMent as  $valueListOrderPayMent) {
                        $PayMentMethod = $valueListOrderPayMent['PaymentMethod'] === 2 ? "Online" : "Trực tiếp";
                        echo "
                            <tr>
                                <td>{$valueListOrderPayMent['NameProduct']}</td>
                                <td>{$valueListOrderPayMent['PriceProduct']} VND</td>
                                <td>{$PayMentMethod}</td>
                                <td>{$valueListOrderPayMent['NumberTable']}</td>
                                <td>{$PayMentMethod}</td>
                                <td>{$valueListOrderPayMent['OrderDate']}</td>
                            </tr>                            
                        ";
                    } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>