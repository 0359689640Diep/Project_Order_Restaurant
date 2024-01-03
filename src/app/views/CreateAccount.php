<link rel="stylesheet" href="../assets/css/user/CreateAccount.css">
    <section class="page">
        <section class="main">
            <article class="headerMain">
                <h1>Đăng ký </h1>
            </article>

            <form action="OnlineController.php?act=TaoTaiKhoan" method="post" class="main">
                <article class="nameAge">
                    <article class="name">
                        <label for="">Tên</label>
                        <input title="Không được để trống" type="text" name="name">
                    </article>
                    <article class="age">
                        <label for="">Giới tính</label>
                        <select title="Không được để trống" name="gender" id="">
                            <option value="0" selected>Giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>

                    </article>
                </article>
                <label for="">Địa chỉ</label>
                <input title="Không được để trống" type="text" name="address">
                <label for="">Email</label>
                <input title="Không được để trống" type="text" name="email">
                <label for="">Mật khẩu</label>
                <input title="Không được để trống" type="password" name="password">
                <label for="">Nhập Lại Mật khẩu</label>
                <input title="Không được để trống" type="password" name="confirmPassword">

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
            <img src="<?= $img_Path ?>HazelnutFettuccinewitSautéedMushrooms_AdventuresinCooking1.png" alt="banner1">
        </article>
    </section>
    <?php
    if (isset($alert)) {
        echo "
        <script> alert('$alert') </script>
        ";
    }
    ?>