const columnOrder = document.querySelectorAll(".columnOrder");
for(const btn of columnOrder){
    let id = btn.dataset.id;
    btn.addEventListener("click", () => {
        window.location.replace(`http://dataphp.com/Project_Order_Restaurant/billdetails?id=${id}`);
    })
}