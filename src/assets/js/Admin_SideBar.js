let isDisplayed = false;

document.querySelectorAll('.itemHeader').forEach(item => {
    item.addEventListener('click', function(e) {
        const angleDownElement = this.nextElementSibling;
        const angleIcons = this.getElementsByTagName('i');
        const secondIcon = angleIcons[1]; // Lấy phần tử thứ hai trong danh sách
        if (isDisplayed) {
            angleDownElement.style.display = "none";
            isDisplayed = false;
            secondIcon.classList.remove('ti-angle-up');
            secondIcon.classList.add('ti-angle-down');
        } else {
            angleDownElement.style.display = "block";
            isDisplayed = true;
            secondIcon.classList.remove('ti-angle-down');
            secondIcon.classList.add('ti-angle-up');
        }
    });
});
