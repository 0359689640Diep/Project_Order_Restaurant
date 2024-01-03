const input = document.getElementById("quantity");
const decrease = document.getElementById("decrease");
const increase = document.getElementById("increase");
const maxQuantity = parseInt(input.getAttribute("max")); 

increase.addEventListener("click", function () {
    const currentValue = parseInt(input.value);

    if (currentValue < maxQuantity) {

        input.value = currentValue + 1;
    }
});

decrease.addEventListener("click", function () {
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
});


  


