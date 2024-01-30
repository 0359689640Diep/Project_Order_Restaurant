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
        window.location.href = window.location.pathname + '?idCategory=' + selectedValue+"&quantity=10";
    };