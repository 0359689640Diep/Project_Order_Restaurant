// Lưu trữ phần tử được chọn
let selectedTable = null;

// Lấy danh sách tất cả các .contentTable
const contentTables = document.querySelectorAll('.contentTable');

// Gán sự kiện click cho mỗi phần tử trong danh sách .contentTable
contentTables.forEach(table => {
    // Kiểm tra nếu class.contentTable có chứa style backgroundColor khác '#CA0910' thì thực hiện các hành động
    if (table.style.backgroundColor !== 'rgb(202, 9, 16)') {
        table.addEventListener('click', () => {
            // Kiểm tra xem .contentTable đã được chọn hay chưa
            const isChecked = table.querySelector(' input[type="radio"]').checked;

            // Nếu .contentTable đã được chọn
            if (isChecked) {
                // Đổi màu của .contentTable đang được chọn và lưu trữ nó vào selectedTable
                table.style.backgroundColor = '#F7C427';
                table.style.color = '#FFFFFF';
                selectedTable = table;
                document.getElementById("submit").disabled = false;

                // Vô hiệu hóa tất cả các .contentTable khác
                contentTables.forEach(otherTable => {
                    if (otherTable !== table && otherTable.style.backgroundColor !== 'rgb(202, 9, 16)') {
                        otherTable.querySelector('input[type="radio"]').disabled = true;
                    }
                });
            } else {
                // Nếu .contentTable đã bị bỏ chọn, kích hoạt lại tất cả các .contentTable khác và xóa selectedTable
                contentTables.forEach(otherTable => {
                    if (otherTable.style.backgroundColor !== 'rgb(202, 9, 16)') {
                        otherTable.querySelector('input[type="radio"]').disabled = false;
                        otherTable.style.backgroundColor = '#30CA73';
                        otherTable.style.color = '#FFFFFF';
                    }
                });
                selectedTable = null;
            }
        });
    }
});
