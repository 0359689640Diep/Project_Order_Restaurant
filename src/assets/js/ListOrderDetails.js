document.getElementById("printOrder").addEventListener("click", () => {
  const btnCheckbox = document.querySelectorAll("input[type=checkbox]");
  btnCheckbox.forEach((checkbox) => {
    if (checkbox.checked) {
      alert('In sản phẩm thành công');
      console.log("value: " + checkbox.value);
      console.log("value: " + checkbox.dataset.id);
    }
  });
});
