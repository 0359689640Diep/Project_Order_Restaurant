document.addEventListener('DOMContentLoaded', function () {
    var checkAllCheckbox = document.getElementById('checkAll');
    var checkboxes = document.querySelectorAll('.rowCheckbox');

    checkAllCheckbox.addEventListener("change", function () {
        var isChecked = checkAllCheckbox.checked;

        checkboxes.forEach(function (checkbox) {
            checkbox.checked = isChecked;
            updateQuantityInput(checkbox);
        });
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateQuantityInput(checkbox);
        });
    });

    function updateQuantityInput(checkbox) {
        var quantityInput = document.getElementById('quantity' + checkbox.dataset.quantityId);
        quantityInput.disabled = !checkbox.checked;
    }

    // Xử lý sự kiện submit
    document.getElementById('cartForm').addEventListener('submit', function (event) {
        checkboxes.forEach(function (checkbox) {
            if (!checkbox.checked) {
                var quantityInput = document.getElementById('quantity' + checkbox.dataset.quantityId);
                quantityInput.disabled = true;
            }
        });
    });
});

// document.getElementById("deleteAll").addEventListener("click", () =>{
//     document.getElementById("formCart").submit();
// })