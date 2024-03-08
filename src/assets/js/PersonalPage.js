let icont = document.getElementById("icont");
icont.addEventListener("click", () => {
    let input = document.getElementById("Password");
    if(input.type === "password"){
        input.type = "text";
        icont.classList.replace("bi-eye-slash", "bi-eye");
    }else{
        input.type = "password";
        icont.classList.replace("bi-eye", "bi-eye-slash");
    }
})
