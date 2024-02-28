document.addEventListener('DOMContentLoaded', function () {
    var checkAllCheckbox = document.getElementById('checkAll');
    var checkboxes = document.querySelectorAll('.rowCheckbox');
    var submit = document.getElementById("submit");

    checkAllCheckbox.addEventListener("change", function () {
        var isChecked = checkAllCheckbox.checked;

        checkboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
            updateInput("quantity", checkbox);
            updateInput("note", checkbox);
        });
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateInput("quantity", checkbox);
            updateInput("note", checkbox);
        });
    });

    function updateInput(id,checkbox) {
        
        var quantityInput = document.getElementById(id + checkbox.dataset.quantityId);
        quantityInput.disabled = !checkbox.checked;
    }
    
    // Loại bỏ thuộc tính disabled cho thẻ button khi có sp được chọn
    var checkboxs = document.querySelectorAll("input[type=checkbox]");
    checkboxs.forEach((checkbox) => {
        checkbox.addEventListener('click', () => {
            if(checkbox.checked) submit.disabled = false;
            else{submit.disabled = true}
        })
    })

    // Xử lý sự kiện submit
    document.getElementById('formCart').addEventListener('submit', function () {
        checkboxes.forEach(function (checkbox) {
            if (!checkbox.checked) {
                var quantityInput = document.getElementById('quantity' + checkbox.dataset.quantityId);
                quantityInput.disabled = true;
                var noteInput = document.getElementById('note' + checkbox.dataset.quantityId);
                noteInput.disabled = true;
            }
        });
    });
});


