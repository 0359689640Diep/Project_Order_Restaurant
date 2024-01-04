<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../public/assets/css/user/Footer.css">
    <link rel="stylesheet" href="./../public/assets/css/user/Header.css">
    <link rel="stylesheet" href="./../public/assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=FontName&display=swap">
</head>


<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <a class="logo_link" href="/">
                    <img src="<?= $img_Path ?>LogoTest-removebg-preview.png" alt="">
                </a>
                <ul>
                    <?php
                    if(isset($data["Category"]) && !empty($data["Category"])){
                        foreach($data["Category"] as $valuesCategory){
                            echo "
                            <li>
                                <a href='/?act=DanhMucSanPham&idCategory={$valuesCategory['IdCategory']}'> {$valuesCategory['NameCategory']} </a>
                            </li>
                            ";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="information">
                <?php if (!empty($_SESSION['user'])) { ?>
                <a href="OnlineController.php?act=GioHang"><img src="<?= $img_Path ?>Vector.png" alt=""></a>
                <a href="OnlineController.php?act=billthanhtoan"><img src="<?= $img_Path ?>Glyph_ undefined.png"
                        alt=""></a>
                <a href="OnlineController.php?act=dangxuat"><img src="<?= $img_Path ?>out.png" alt=""></a>
                <a href="OnlineController.php?act=LoginThuong">
                    <div class="avatar">
                        <img src="<?= $img_Path ?>Login.png" width="10px" alt="">
                    </div>
                </a>
                <?php } else { ?>
                <div class="login">
                    <button class="button_login"><a href="<?= $onlineAction ?>dangnhap">Đăng nhập</a></button>
                    <button class="button_login"><a href="<?= $onlineAction ?>TaoTaiKhoan">Đăng Ký</a></button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>