<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="<?= $_ENV["admintStyle"] ?>Layout.css">
<?= $_ENV['icont'] ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <section class="page">
        <header>
            <article class="header_logo">
                <img src="<?= $_ENV['img_Path'] ?>LogoTest-removebg-preview.png" alt="">
            </article>
            <nav class="header_nav">
                <a href="<?= $_ENV['basePath'] ?>admin">Trang chủ</a>
                <a href="<?= $_ENV['basePath'] ?>">Trang Cán Nhân</a>
                <a href="<?= $_ENV['basePath'] ?>">Đăng Xuất</a>
            </nav>
            <article class="header_profile">
                <img src="<?= $_ENV['img_Path'] ?>LogoTest-removebg-preview.png" alt="">
                <p>Vu Hong Diep</p>
            </article>
        </header>
        <main>