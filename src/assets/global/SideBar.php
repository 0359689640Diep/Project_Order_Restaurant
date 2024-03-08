    <link rel="stylesheet" href="<?= $_ENV['clientsStyle'] ?>SideBar.css">

    <section class="asside">
        <section class="headerAsside">
            <article class="img">
                <img src="<?= $_ENV["imgUpload"] . $_SESSION['KH']['ImageAccounts'] ?>" alt="<?= $dataProfile['ImageAccounts'] ?>">
            </article>
            <article class="name">
                <h1> <?= $_SESSION['KH']['NameAccount'] ?> </h1>
            </article>
        </section>
        <section class="mainAside">
            <ul>
                <li> <a href="<?= $_ENV['basePath'] ?>personalpage">Trang cá nhân</a> <i class="ti-angle-down"></i>
                </li>
                <li> <a href="<?= $_ENV['basePath'] ?>bill">Lịch sử thanh toán</a> <i class="ti-angle-down"></i>
                </li>
                <li> <a href="<?= $_ENV['basePath'] ?>comment">Bình luận sản phẩm</a> <i class="ti-angle-down"></i>
                </li>
            </ul>
        </section>
    </section>