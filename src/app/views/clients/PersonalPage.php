<?php

use App\src\assets\global\Notification;

include_once $_ENV["header_Path"];
if (isset($message) && !empty($message)) {
    new Notification($message);
}

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>PersonalPage.css">
<section class="page">
    <main>
        <?php include_once $_ENV["SideBar_Path"];  ?>

        <form action="personalpage?id=<?= $dataProfile['IdAccount'] ?>" method="post" class="containerMain"
            enctype="multipart/form-data">
            <article class="headerMain">
                <h1>Trang cá nhân của tôi</h1>
            </article>
            <section class="ContainerMains">
                <section class="contentMain">
                    <article class="itemContentMain">
                        <label for="NameAccount">Tên</label>
                        <input value="<?= $dataProfile['NameAccount'] ?>" type="text" id="NameAccount"
                            name="NameAccount" autofocus>
                    </article>
                    <article class="itemContentMain">
                        <label for="Gmail">Email</label>
                        <input value="<?= $dataProfile['Gmail'] ?>" type="email" id="Gmail" name="Gmail">
                    </article>
                    <article class="itemContentMainGender">
                        <label for="Nam">
                            Nam
                            <input value="0" type="radio" id="Nam" name="Gender"
                                <?= $dataProfile['Gender'] == 0 ? "checked" : "" ?>>
                        </label>
                        <label for="Nữ">
                            Nữ
                            <input value="1" type="radio" id="Nữ" name="Gender"
                                <?= $dataProfile['Gender'] == 1 ? "checked" : "" ?>>
                        </label>

                    </article>
                    <article class="itemContentMain">
                        <label for="Password">Mật khẩu</label>
                        <input value="<?= $dataProfile['Password'] ?>" type="password" id="Password" name="Password">
                        <i id="icont" class="bi bi-eye-slash"></i>
                    </article>

                </section>

                <section class="contentImage">
                    <article class="itemContentMain">
                        <img src="<?= $_ENV['imgUpload'] .  $dataProfile['ImageAccounts'] ?>" alt="">
                        <input type="hidden" name="ImageAccountsOld" value="<?= $dataProfile['ImageAccounts'] ?>">
                        <input style="border: none;" type="file" name="ImageAccounts">
                    </article>
                </section>
            </section>
            <article class="buttonSubmit">
                <button type="submit">Lưu</button>
            </article>
        </form>
    </main>
</section>
<script src="<?= $_ENV['javaScript'] ?>PersonalPage.js"></script>