<link rel="stylesheet" href="../assets/css/user/LoginThuong.css">
<div class="box_login">
        <div class="layer"></div>
        <div class="login">
            <form action="../online/OnlineController.php?act=dangnhap" method="POST" class="content_login">
                <h2>ĐĂNG NHẬP</h2>
                <p>Gmail</p>
                <input type="email" placeholder="" name="tk">
                <p>Mật Khẩu</p>
                <input type="password" placeholder="" name="mk">
                <button type="submit">Đăng nhập</button>
                <div class="option">
                    <a href="OnlineController.php?act=TaoTaiKhoan">Đăng ký</a>
                    <a href="OnlineController.php?act=ForgotPassword">Quên mật khẩu ?</a>
                </div>
            </form>
            <div class="img_login">
                <img src="<?= $img_Path?>OnePotPastamitBratwurstbällchenKleinesKulinarium.png" width="100%" alt="">
            </div>
        </div>
    </div>