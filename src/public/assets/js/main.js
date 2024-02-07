function previewFile() {
    let preview = document.getElementById("previewImage");
    let fileInput = document.getElementById("fileInput");
    let file = fileInput.files[0];
    let reader = new FileReader();

    reader.onloadend = () => {
        preview.src = reader.result;
    }

    if(file){
        reader.readAsDataURL(file);
    }else{
        preview.src = "";
    }
}