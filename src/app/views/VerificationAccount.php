<link rel="stylesheet" href="../assets/css/user/ForgotPassword.css">
<div class="Login_thuong">
    <div class="img"><img src="<?= $img_Path?>Login.png" alt=""></div>
    <div class="content_login_thuong">
        <form action="OnlineController.php?act=VerificationAccount&gmail=<?= $_GET['gmail'] ?>" method="POST">
            <h2 style="font-size: 65px;">Nhập mật khẩu mới</h2>
            <p>Nhập mã xác nhận</p>
            <input type="text"  required placeholder="" name="Verification">
            <p>Nhập mật khẩu mới</p>
            <input type="password"  required placeholder="" name="newPassword">
            <button type="submit">Xác nhận</button>
        </form>
        <nav class="navication">
            <a href="OnlineController.php?act=dangnhap">Đăng nhập</a>
            <a href="OnlineController.php?act=ForgotPassword">Bạn đã quên mật khẩu ?</a>
        </nav>
    </div>
</div>