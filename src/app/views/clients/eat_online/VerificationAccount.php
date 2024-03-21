<?php

use App\src\assets\global\Notification;

if (isset($path) && !empty($path) && isset($message) && !empty($message) && $message === true) {
    header("Location: " . $_ENV["baseUrl"] . $path);
} elseif (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyleOnline"] ?>Login.css">
<div class="box_login">
    <div class="layer"></div>
    <div class="login">
        <form action="<?= $_ENV["basePath"] ?>verifyAccount" method="POST" class="content_login">
            <h2>Xác Nhận Tài Khoản</h2>
            <input type="text" required title="Không được để trống" placeholder="Mật Khẩu" name="codeVerify">
            <button type="submit">Xác nhận</button>
            <div class="option">
                <a href="<?= $_ENV["baseUrl"] ?>signIn">Đăng ký</a>
                <a href="<?= $_ENV["baseUrl"] ?>login">Đăng nhập</a>
            </div>
        </form>
        <div class="img_login">
            <img src="<?= $_ENV["img_Path"] ?>OnePotPastamitBratwurstbällchenKleinesKulinarium.png" width="100%" alt="">
        </div>
    </div>
</div>