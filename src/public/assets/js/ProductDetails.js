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

function renderSizeAndImage(data){

    // Chọn giá trị mặc định là giá trị của option đầu tiên
    let image = document.getElementById("sizeImage");
    let price = document.getElementById("price");
    let optionSizeDefault = document.getElementById("optionSizeDefault");

    price.value = data[0]['PriceSize'];
    image.src = "./../public/assets/img/upload/"+data[0]['ImageSize'];
    optionSizeDefault.value = data[0]['IdSizeDefault'];
    optionSizeDefault.innerHTML = data[0]['SizeDefault'];

    // Xử lý sự kiện khi thay đổi option
    document.getElementById('selectSize').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        data.forEach(element => {
            if(element['IdSizeDefault'] === parseInt(selectedOption.value)){
                price.value = element['PriceSize'];
                image.src = "./../public/assets/img/upload/"+element['ImageSize'];
                optionSizeDefault.value = element['IdSizeDefault'];
                optionSizeDefault.innerHTML = element['SizeDefault'];                
            }
        });
    
    });
    
}


  


