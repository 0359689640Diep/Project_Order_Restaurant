<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $_ENV['clientsStyleOnline'] ?>Footer.css">
    <link rel="stylesheet" href="<?= $_ENV['clientsStyleOnline'] ?>Header.css">
    <link rel="stylesheet" href="<?= $_ENV['baseUrl'] ?>src/assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=FontName&display=swap">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <a class="logo_link" href="<?= $_ENV["baseUrl"] ?>">
                    <img src="<?= $_ENV["img_Path"] ?>LogoTest-removebg-preview.png" alt="">
                </a>
                <ul>
                    <?php
                    if (isset($data["Category"]) && !empty($data["Category"])) {
                        foreach ($data["Category"] as $valuesCategory) {
                            echo "
                            <li>
                                <a href='{$_ENV['baseUrl']}categorys?idCategory={$valuesCategory['IdCategory']}&quantity=10'> {$valuesCategory['NameCategory']} </a>
                            </li>
                            ";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="information">
                <?php if (!empty($_SESSION['KH'])) { ?>
                <a href="<?= $_ENV['basePath'] ?>cart"><img src="<?= $_ENV["img_Path"]  ?>Vector.png" alt=""></a>
                <a href="<?= $_ENV['basePath'] ?>logout"><img src="<?= $_ENV["img_Path"]  ?>out.png" alt=""></a>
                <a href="<?= $_ENV['basePath'] ?>personalpage">
                    <div class="avatar">
                        <img src="<?= $_ENV["img_Path"] ?>Login.png" width="10px" alt="">
                    </div>
                </a>
                <?php } else { ?>
                <div class="login">
                    <button class="button_login"><a href="<?= $_ENV["basePath"] ?>login">Đăng nhập</a></button>
                    <button class="button_login"><a href="<?= $_ENV["basePath"] ?>signIn">Đăng Ký</a></button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>