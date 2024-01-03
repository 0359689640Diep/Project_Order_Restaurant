<link rel="stylesheet" href="../assets/css/user/ChiTietSanPham.css">
<div class="chitietsanpham">
    <div class="layer"></div>
    <div class="product_detail">
        <div class="anh">
            <img src="<?= $imgPathAdmin ?>" id="sizeImage" height="100%">
        </div>
        <form action="OnlineController.php?act=LoadChiTietSanPham&id=<?= $_GET['id'] ?>" method="post" class="content">
            <h1><?= $pro['NameProduct'] ?></h1>
            <input type="hidden" name="IdProduct" value="<?= $pro['IdProduct'] ?>">
            <input type="hidden" name="PriceProduct" value="<?= $pro['PriceProduct'] ?>">
            <div class="hr"></div>
            <ul>
                <li>Giá: <span style="color: red;opacity: 90%;" id="displayPrice"></span> VNĐ</li>
                <li><?= $pro['ProductDetails'] ?></li>
                <li><?= $pro['ProductDescription'] ?></li>
            </ul>
            <div class="option">
                <div class="tanggiam">
                    <p>Số lượng mua&nbsp;&nbsp;</p>
                    <button type="button" id="decrease">-</button>

                    <input required type="number" value="1" name="Quantity" id="quantity" min="1" max="<?= $pro["QuantityProduct"] ?>">

                    <button type="button" id="increase" value="<?= $proSize[0]["QuantityProduct"] ?>">+</button>
                </div>
                <div class="tanggiam">
                    <p>Size&nbsp;&nbsp;</p>

                    <select name="SizeProduct" id="selectSize">
                        <?php foreach ($proSize as $i) : ?>
                            <option value="<?= $i['NameSize'] ?>" data-image="<?= $i['ImgSizePro'] ?>" data-price="<?= $i['Price'] ?>"><?= $i['NameSize'] ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
            </div>
            <button class="order" name="add_to_cart">Thêm Giỏ Hàng</button>
            <button class="order" name="pay_now">Mua Ngay</button>
        </form>
    </div>
    <div class="list">
        <?php

        foreach (chiTietSanPham__GetComment($_GET['id']) as $valuesComment) {
            echo "
                <div class='comment'>
                    <article class='content'>
                        <p>{$valuesComment['Content']}</p>
                    </article> 
                    <article class='persion'>
                        <img src='{$imgPathAdmin}{$valuesComment['ImageAccounts']}' alt='{$valuesComment['ImageAccounts']}'>
                        <h3>{$valuesComment['NameAccount']}</h3>
                    </article>
                </div>
                ";
        }

        ?>
    </div>
    <div class="list">
        <?php

        foreach (home_GetAllProduct() as $valuesPro) {
            echo "
                <div class='pro'>
                    <a href='OnlineController.php?act=LoadChiTietSanPham&id={$valuesPro['IdProduct']}'>
                        <div class='img' style='height:230px'>
                            <img src='{$imgPathAdmin}{$valuesPro['ImageProduct']}' alt='{$valuesPro['ImageProduct']}'>
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
                foreach (chiTietSanPham_GetTopProduct() as $valuesTop) {
                    echo "
                        <a href='OnlineController.php?act=LoadChiTietSanPham&id={$valuesTop['IdProduct']}' class='item'>
                            <img src='{$imgPathAdmin}{$valuesTop['ImageProduct']}' alt='{$valuesTop['ImageProduct']}'>
                            <p>{$valuesTop['NameProduct']}</p>
                            <h3>{$valuesTop['PriceProduct']} VND</h3>
                        </a>
                        ";
                }
                ?>
            </div>
        </a>
    </div>
</div>
<script src="../assets/js/ChiTietSanPham.js"></script>
<script>
    // Chọn giá trị mặc định là giá trị của option đầu tiên
    var defaultPrice = <?= reset($proSize)['Price'] ?>;
    var sizeImage = document.getElementById('sizeImage');
    var defaultImage = '<?= $adminImg . reset($proSize)['ImgSizePro'] ?>';
    document.getElementById('displayPrice').innerText = defaultPrice;

    sizeImage.src = defaultImage;
    // Xử lý sự kiện khi thay đổi option
    document.getElementById('selectSize').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');

        document.getElementById('displayPrice').innerText = price;
        sizeImage.src = '<?= $adminImg ?>' + selectedOption.getAttribute('data-image');

    });
</script>