<?php

use App\src\assets\global\Notification;

include_once $_ENV['header_Path'];
$dataSize = json_encode($SizeByIdProduct);

if (isset($message) && !empty($message)) {
    new Notification($message);
}

?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyleOnline"] ?>ProductDetails.css">
<div class="chitietsanpham">
    <div class="layer"></div>
    <div class="product_detail">
        <div class="anh">
            <img src="<?= $_ENV["imgUpload"] ?>" id="sizeImage" height="100%">
        </div>
        <form action="<?= $_ENV["basePath"] ?>productDetails?id=<?= $_GET['id'] ?>&name=<?= $_GET['name'] ?>" method="post" class="content">
            <h1><?= $ProductById['NameProduct'] ?></h1>
            <div class="hr"></div>
            <ul>
                <li>Giá: <input name="price" id="price" value="" readonly />
                    <span id="SEO"></span> VNĐ
                </li>
                <li><?= $ProductById['ProductDetails'] ?></li>
                <li><?= $ProductById['ProductDescription'] ?></li>
            </ul>
            <div class="option">
                <div class="tanggiam">
                    <p>Số lượng mua&nbsp;&nbsp;</p>
                    <button type="button" id="decrease">-</button>

                    <input required type="number" value="1" name="Quantity" id="quantity" min="1" max="<?= $ProductById["QuantityProduct"] ?>">

                    <button type="button" id="increase" value="<?= $QuantityProduct ?>">+</button>
                </div>
                <div class="tanggiam">
                    <p>Size&nbsp;&nbsp;</p>

                    <select name="IdSize" id="selectSize">
                        <option value="" id="optionSizeDefault"></option>
                        <?php foreach ($ListSizeByIdProduct as $i) : ?>
                            <option value="<?= $i['IdSize'] ?>">
                                <?= $i['SizeDefault'] ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>
            </div>
            <button class="order" type="submit" name="add_to_cart">Thêm Giỏ Hàng</button>
        </form>
    </div>
    <div class="list">
        <?php

        foreach ($ListCommentByIdProduct as $valuesComment) {
            echo "
                <div class='comment'>
                    <article class='content'>
                        <p>{$valuesComment['Comment']}</p>
                    </article> 
                    <article class='persion'>
                        <img src='{$_ENV["imgUpload"]}{$valuesComment['ImageAccounts']}' alt='{$valuesComment['ImageAccounts']}'>
                        <h3>{$valuesComment['NameAccount']}</h3>
                    </article>
                </div>
                ";
        }

        ?>
    </div>
    <div class="list">
        <?php

        foreach ($AllProduct as $valuesPro) {
            echo "
                <div class='pro'>
                    <a href='productDetails?id={$valuesPro['IdProduct']}&name={$valuesPro['NameProduct']}'>
                        <div class='img' style='height:230px'>
                            <img src='{$_ENV["imgUpload"]}{$valuesPro['ImageProduct']}' alt='{$valuesPro['ImageProduct']}'>
                        </div>
                        <p style='color: white;'>{$valuesPro['NameProduct']}</p>
                    </a>
                </div>
                ";
        }

        ?>
    </div>
    <div class="top">
        <h2>TOP MUA NHIỀU NHẤT</h2>
        <a href="">
            <div class="list_item">
                <?php
                foreach ($Top3ProductById as $valuesTop) {
                    echo "
                        <a href='productDetails?id={$valuesTop['IdProduct']}&name={$valuesTop['NameProduct']}' class='item'>
                            <img src='{$_ENV["imgUpload"]}{$valuesTop['ImageProduct']}' alt='{$valuesTop['ImageProduct']}'>
                            <p>{$valuesTop['NameProduct']}</p>
                        </a>
                        ";
                }
                ?>
            </div>
        </a>
    </div>
</div>
<script src="<?= $_ENV["javaScript"] ?>ProductDetails.js">
</script>
<script>
    renderSizeAndImage(<?= $dataSize ?>);
</script>
<?php
include_once $_ENV['footer_Path'];
?>