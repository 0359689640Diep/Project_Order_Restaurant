<?php
use App\public\assets\global\Notification;
if(isset($message) && !empty($message)) {
    // test($message);
    // extract($message);
    new Notification($message);

}
?>
<link rel="stylesheet" href="<?= $_ENV["userStyle"] ?>SignIn.css">
<section class="page">
    <section class="main">
        <article class="headerMain">
            <h1>Đăng ký </h1>
        </article>

        <form action="<?= $_ENV["baseUrl"] ?>signIn" method="post" class="main">

            <input placeholder="Tên" title="Không được để trống" type="text" id="name" name="NameAccount">

            <select placeholder="Giới tính" title="Không được để trống" name="Gender" id="gender">
                <option value="0" selected>Giới tính</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
                <option value="2">Khác</option>
            </select>

            <input placeholder="Email" title="Không được để trống" type="text" id="email" name="Gmail">

            <input placeholder="Mật khẩu" title="Không được để trống" type="password" id="password" name="Password">

            <input placeholder="Nhập Lại Mật khẩu" title="Không được để trống" type="password" id="confirmPassword"
                name="confirmPassword">

            <input type="submit" value="Đăng Ký">
        </form>
        <section class="footerMain">
            <section class="itemContent">
                <p>Tôi đã có tải khoản</p>
                <a href="<?= $_ENV["baseUrl"] ?>login">Đăng nhập</a>
            </section>
        </section>
    </section>
    <article class="banner">
        <img src="<?= $_ENV["img_Path"] ?>HazelnutFettuccinewitSautéedMushrooms_AdventuresinCooking1.png" alt="banner1">
    </article>
</section>