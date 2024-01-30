<?php
include_once $_ENV['header_Path'];
?>
<link rel="stylesheet" href="<?= $_ENV["clientsStyle"] ?>Categorys.css">
<div class="danh_sach_san_pham">
    <div class="layer"></div>
    <div class="slideshow">
        <div class="mySlides fade">
            <img src="<?= $_ENV["img_Path"] ?>FoodFacebookCoverTemplatesPSD1.png" alt="Slide 1">
        </div>
        <div class="mySlides fade">
            <img src="<?= $_ENV["img_Path"] ?>FoodFacebookCoverTemplatesPSD2.png" alt="Slide 2">
        </div>
        <div class="mySlides fade">
            <img src="<?= $_ENV["img_Path"] ?>FoodFacebookCoverTemplatesPSD3.png" alt="Slide 3">
        </div>
    </div>
    <div class="timkiem">
        <form action="<?= $_ENV["basePath"] ?>categorys?idCategory=<?= $_GET['idCategory'] ?>" method="post">
            <input type="search" placeholder="Tìm kiếm theo từ khóa" name="contentShearch">
            <select name="" id="category">
                <option value="">Chọn danh mục của bạn</option>
                <?php
                foreach ($Category as $valueCategory) {
                    echo " <option value='{$valueCategory['IdCategory']}'> {$valueCategory['NameCategory']} </option> ";
                }
                ?>
            </select>
            <button type="submit">Tìm Kiếm</button>
        </form>
    </div>
    <div class="Slideshow_Product" id="slideshow">
        <?php
        foreach ($dataProduct as $valueProducts) {
            echo "
                    <div class='content_pro'>
                        <img src='" . $_ENV['imgUpload'] . $valueProducts['ImageProduct'] . "' alt='img'>
                        <h2>{$valueProducts['NameProduct']}</h2>

                        <!-- Mô tả chính -->
                        <p>{$valueProducts['ProductDetails']}</p>
                        <a href='productDetails?id={$valueProducts['IdProduct']}' class='button_div'>
                            <button>Chi Tiết Sản Phẩm</button>
                        </a>
                    </div>
                    ";
        }

        ?>
    </div>
    <div class="buttonPage">
        <?php
        if ($quanlityProduct > 0) {
            for ($i = 1; $i < $quanlityProduct; $i++) {
                echo "
                    <a href='categorys?idCategory={$_GET['idCategory']}&page={$i}'>$i</a>
                    ";
            }
        }
        ?>
    </div>
</div>
<script src="<?= $_ENV["javaScript"] ?>Category.js"></script>
<?php
include_once $_ENV['footer_Path'];
?>