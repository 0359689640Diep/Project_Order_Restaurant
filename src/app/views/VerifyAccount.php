    <link rel="stylesheet" href="../assets/css/user/CreateAccount.css">
    <section class="page">
        <section class="main">
            <article class="headerMain">
                <h1>Xác nhận Tài khoản</h1>
            </article>

            <form action="OnlineController.php?act=VerifyAccount" method="post" class="main">
                <label for="">Nhập mã xác nhận *</label>
                <input title="Không được để trống" type="text" name="confirmCodeGmail">
                <?php
                if (isset($alert) && !empty($alert)) {
                    echo "<h1 style='color: while'>$alert</h1>";
                }
                ?>
                <input type="submit" value="Đăng nhập">
            </form>
            <section class="footerMain">
                <section class="itemContent">
                    <p>Tôi đã có tải khoản</p>
                    <a href="OnlineController.php?act=LoginThuong">Đăng nhập</a>
                </section>
            </section>
        </section>
        <article class="banner">
            <img src="<?= $img_Path ?>banner1.png" alt="banner1">
        </article>
    </section>
    <?php
    if (isset($alert)) {
        echo "
        <script> alert('$alert') </script>
        ";
    }
    ?>