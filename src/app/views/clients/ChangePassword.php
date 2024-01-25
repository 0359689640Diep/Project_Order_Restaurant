
    <link rel="stylesheet" href="../assets/css/user/ChangePassword.css">
    <section class="page">
        <article class="banner">
            <img src="<?= $img_Path?>banner1.png" alt="banner1">
        </article>
        <section class="main">
            <article class="headerMain">
                <h1>Đăng nhập </h1>
            </article>
            
            <form action="" method="post" class="main">
                <label for="">Tài khoản *</label>
                <input type="text"  name = "account">
                <label for="">Mật khẩu  mới*</label>
                <input  type = "password" name = "password">
                <label for="">Nhập lại mật khẩu mới*</label>
                <input  type = "password" name = "comfimPassword">
                <input  type = "submit" name="submit" value="Đăng nhập">

            </form>
            <section class="footerMain">
                <section class="itemContent1">
                    <article></article>
                    <article>Hoặc</article>
                    <article></article>
                </section>
                <section class="itemContent2">
                    <p>Đăng ký</p>
                    <p>nếu bạn chưa có tải khoản ?</p>
                </section>
            </section>
        </section>
    </section>
