<link rel="stylesheet" href="../assets/css/user/ProductPortfolio.css">
<div class="danh_sach_san_pham">
        <div class="layer"></div>
        <div class="slideshow">
            <div class="mySlides fade">
                <img src="<?=$img_Path?>FoodFacebookCoverTemplatesPSD1.png" alt="Slide 1">
            </div>
            <div class="mySlides fade">
                <img src="<?=$img_Path?>FoodFacebookCoverTemplatesPSD2.png" alt="Slide 2">
            </div>
            <div class="mySlides fade">
                <img src="<?=$img_Path?>FoodFacebookCoverTemplatesPSD3.png" alt="Slide 3">
            </div>
        </div>
        <div class="timkiem">
            <form action="OnlineController.php?act=DanhMucSanPham&idCategory=<?= $_GET['idCategory']?>" method="post">
                <input type="search" placeholder="Tìm kiếm theo từ khóa" name="contentShearch">
                <select name="" id="category">
                    <option value="">Chọn danh mục của bạn</option>
                    <?php 
                    foreach(productPortfolio_GetAllCateogry() as $valueCategory){
                        echo " <option value='{$valueCategory['IdCategory']}'> {$valueCategory['NameCategory']} </option> ";
                    }
                    ?>
                </select>
                <button type="submit">Tìm Kiếm</button>
            </form>
        </div>
        <div class="Slideshow_Product" id="slideshow">
            <?php 
            if(isset($dataProductPortfolio)) {
                foreach ($dataProductPortfolio as $valueProducts) {
                    echo "
                    <div class='content_pro'>
                        <img src='../assets/img/admin/{$valueProducts['ImageProduct']}' alt='{$valueProducts['ImageProduct']}'>
                        <h2>{$valueProducts['NameProduct']}</h2>
              
                        <!-- Mô tả chính -->
                        <p>{$valueProducts['ProductDetails']}</p>
                        <a href='?act=LoadChiTietSanPham&id={$valueProducts['IdProduct']}' class='button_div'>
                            <button>Chi Tiết Sản Phẩm</button>
                        </a>
                    </div>
                    ";
                } 
            }elseif(isset($GetAllProductAsRequested) && !empty($GetAllProductAsRequested)){
                foreach ($GetAllProductAsRequested as $valueProducts) {
                    echo "
                    <div class='content_pro'>
                        <img src='../assets/img/admin/{$valueProducts['ImageProduct']}' alt='{$valueProducts['ImageProduct']}'>
                        <h2>{$valueProducts['NameProduct']}</h2>
              
                        <!-- Mô tả chính -->
                        <p>{$valueProducts['ProductDetails']}</p>
                        <a href='?act=LoadChiTietSanPham&id={$valueProducts['IdProduct']}' class='button_div'>
                            <button>Chi Tiết Sản Phẩm</button>
                        </a>
                    </div>
                    ";
                } 
            }
             ?>
        </div>
    </div>
    <script>
        let slideIndex = 0;

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Thay đổi slide mỗi 2000ms (2 giây)
        }

        document.addEventListener("DOMContentLoaded", function() {
            showSlides(); // Bắt đầu hiển thị slideshow khi trang đã tải xong
        });

        // Lấy thẻ select và đăng ký sự kiện onchange
        var select = document.getElementById("category");
        select.onchange = function() {
        // Lấy giá trị option đang chọn
        var selectedValue = select.options[select.selectedIndex].value;
        console.log(selectedValue); 
        // Thay đổi giá trị của idCategory trên URL
        window.location.href = window.location.pathname + '?act=DanhMucSanPham&idCategory=' + selectedValue;
        };

    </script>   