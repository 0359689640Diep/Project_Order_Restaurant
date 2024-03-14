document.addEventListener('DOMContentLoaded', function () {
    var radio = document.querySelectorAll('.rowRadio');
    var submit = document.getElementById("submit");


    radio.forEach(function (btnRadio) {
        btnRadio.addEventListener('change', function () {
            updateInput("quantity", btnRadio);
        });
    });

    function updateInput(id,btnRadio) {
        
        var quantityInput = document.getElementById(id + btnRadio.dataset.quantityId);
        quantityInput.disabled = !btnRadio.checked;
    }
    
    // Loại bỏ thuộc tính disabled cho thẻ button khi có sp được chọn
    var btnRadios = document.querySelectorAll("input[type=radio]");
    btnRadios.forEach((btnRadio) => {
        btnRadio.addEventListener('click', () => {
            if(btnRadio.checked) submit.disabled = false;
            else{submit.disabled = true}
        })
    })

    // Xử lý sự kiện submit
    document.getElementById('formCart').addEventListener('submit', function () {
        radio.forEach(function (btnRadio) {
            if (!btnRadio.checked) {
                // gắn thuộc tính disabled cho thẻ radio và input quality
                btnRadio.disabled = true;
                let idSubProduct = btnRadio.getAttribute("data-quantity-id");
                document.getElementById("quantity"+idSubProduct).disabled = true;
            }
        });
    });
});


