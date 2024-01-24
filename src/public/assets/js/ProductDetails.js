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
    let optionSizeDefault = document.getElementById("optionSizeDefault");
    let price = document.getElementById("price");
    let SEO = document.getElementById("SEO");

    image.src = "./../public/assets/img/upload/"+data[0]['ImageSize'];
    optionSizeDefault.value = data[0]['IdSizeDefault'];
    optionSizeDefault.innerHTML = data[0]['SizeDefault'];
    console.log(data[0]['SEO']);
    if(data[0]['SEO'] !== 0 && data[0]['SEO'] !== null) {
        price.value =  data[0]['PriceSize'] - ((data[0]['SEO'] / 100) * data[0]['PriceSize']);
        SEO.innerHTML = " - "+data[0]['SEO']+" %";
    }else{
        price.value =  data[0]['PriceSize'];
    }

    // Xử lý sự kiện khi thay đổi option
    document.getElementById('selectSize').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        data.forEach(element => {
            if(element['IdSizeDefault'] === parseInt(selectedOption.value)){
                image.src = "./../public/assets/img/upload/"+element['ImageSize'];
                optionSizeDefault.value = element['IdSizeDefault'];
                optionSizeDefault.innerHTML = element['SizeDefault'];  
                if(element['SEO'] !== 0 && element['SEO'] !== null ) {
                    price.value =  element['PriceSize'] - ((element['SEO'] / 100) * data[0]['PriceSize']);
                    SEO.innerHTML = " - "+element['SEO']+" %";
                }else{
                    price.value =  element['PriceSize'];
                }              
            }
        });
    
    });
    
}


  


