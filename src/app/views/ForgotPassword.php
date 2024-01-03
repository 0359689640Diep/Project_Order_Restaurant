<link rel="stylesheet" href="../assets/css/user/ForgotPassword.css">
<div class="Login_thuong">
    <div class="img"><img src="<?= $img_Path?>Login.png" alt=""></div>
    <div class="content_login_thuong">
        <form action="OnlineController.php?act=ForgotPassword" method="POST">
            <h2 style="font-size: 65px;">Quên mật khẩu</h2>
            <p>Nhập Gmail</p>
            <input type="email"  required placeholder="" name="Gmail">
            <button type="submit">Xác nhận tài khoản</button>
        </form>
        <div class="navication">
                <a href="OnlineController.php?act=LoginThuong">Đăng nhập</a>
                <a href="OnlineController.php?act=TaoTaiKhoan">Đăng ký</a>
            </div>
    </div>
</div>