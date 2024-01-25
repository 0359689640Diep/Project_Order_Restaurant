<link rel="stylesheet" href="../assets/css/user/LoginThuong.css">
<div class="Login_thuong">
    <div class="img"><img src="<?= $img_Path?>Login.png" alt=""></div>
    <div class="content_login_thuong">
        <form action="../user/UserController.php?act=dangnhap_AnTaiQuan" method="POST">
            <h2 style="font-size: 65px;">Khách Hàng Ăn Tại Quán</h2>
            <h3 style="font-size: 30px;margin-bottom: 20px ;  color: #F7C427;">* Bỏ Qua Nhập Tên Nếu Như Bạn đã từng ăn ở đây </h3>
            <p>Nhập tên</p>
            <input type="NameAccount"  placeholder="" name="NameAccount_tk_nhanh">
            <p>Nhập Gmail</p>
            <input type="email"  required placeholder="" name="Gmail_tk_nhanh">
            <button type="submit">Bắt Đầu Order</button>
        </form>
    </div>
</div>