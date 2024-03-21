<link rel="stylesheet" href="../assets/css/user/AddComments.css">
<section class="page">
        <main>
            <aside class="aside">
            <section class="headerAside">
                    <article class="img">
                        <img src="../assets/img/admin/<?= $dataProfile['ImageAccounts']?>" alt="">
                    </article>
                    <article class="content">
                        <h1><?= $_SESSION['user']["NameAccount"] ?></h1>
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
                        <li> <a href="OnlineController.php?act=AddComment">Bình luận sản phẩm</a> <i class="ti-angle-down"></i> </li>
                        <li> <a href="OnlineController.php?act=ListComment">Sản phẩm đã bình luận</a> <i class="ti-angle-down"></i> </li>
                        <li>  Tổng số lượng sản phẩm đã sử dụng: <?= count($listOrderPayMent) ?> </li>
                    </ul>
                </section>
            </aside>
            <section class="containerMain">
                <section class="headerMain">
                    <section class="titleMain">
                        <h1>Viết đánh giá</h1>
                    </section>
                </section>
                <section class="contentMain">
                    <?php 
                    foreach ($listComment as  $valueListOrderComment) {
                        echo "
                        <form action='OnlineController.php?act=AddComment&idProduct={$valueListOrderComment['IdProduct']}&IdOrder={$valueListOrderComment['IdOrder_Pro']}' method='post' class='contentComment'>
                            <article class='product'>
                                <img src='$imgPathAdmin{$valueListOrderComment['ImageProduct']}' alt='img'>
                                <h1>{$valueListOrderComment['NameProduct']}</h1>
                            </article>
                            <article class='content'>
                                <input type='text' name='content' autofocus>
                            </article>
                            <article class='sendContent'>
                                <input type='submit' value='Gửi'>
                            </article>
                        </form>
                        ";
                    }
                    ?>
                </section>
            </section>
        </main>
  
    </section>