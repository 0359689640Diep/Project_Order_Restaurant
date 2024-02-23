<?php

use App\src\assets\global\Notification;

if (isset($path) && !empty($path) && isset($message) && !empty($message) && $message === true) {
    if ($path === "KH") header("Location: " . $_ENV["baseUrl"]);
    else {
        header("Location: " . $_ENV["baseUrl"] . $path);
    }
} elseif (isset($message) && !empty($message)) {
    new Notification($message);
}
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Login.css">
<div class="box_login">
    <div class="layer"></div>
    <div class="login">
        <form action="<?= $_ENV["basePath"] ?>login" method="POST" class="content_login">
            <h2>ĐĂNG NHẬP</h2>
            <input type="email" required title="Không được để trống" placeholder="Gmail" name="email">
            <input type="password" required title="Không được để trống" placeholder="Mật Khẩu" name="password">
            <button type="submit">Đăng nhập</button>
            <div class="option">
                <a href="<?= $_ENV["baseUrl"] ?>signIn">Đăng ký</a>
                <a href="<?= $_ENV["baseUrl"] ?>ForgotPassword">Quên mật khẩu ?</a>
            </div>
        </form>
        <div class="img_login">
            <img src="<?= $_ENV["img_Path"] ?>OnePotPastamitBratwurstbällchenKleinesKulinarium.png" width="100%" alt="">
        </div>
    </div>
</div>