function displayComment(dataComment, next, back,  classData, idIndex, idLengthData) {
    document.addEventListener("DOMContentLoaded", function() {
      const commentection = document.getElementById(classData);
      const prevBtn = document.getElementById(back);
      const nextBtn = document.getElementById(next);
      const index= document.getElementById(idIndex);
      document.getElementById(idLengthData).innerHTML = dataComment.length;
  
      const commentPerPage = 1; // Số lượng sản phẩm mỗi trang
      let currentPage = 0; // Trang hiện tại
  
      function displayComment() {
        commentection.innerHTML = ""; // Xóa sản phẩm hiện tại trước khi hiển thị sản phẩm mới
        
        const startIndex = currentPage * commentPerPage;
        const endIndex = (currentPage + 1) * commentPerPage;
        const commentToShow = dataComment.slice(startIndex, endIndex);
  
        for (let i = 0; i < commentToShow.length; i++) {
          const itemComment = commentToShow[i];
          commentection.innerHTML += `
          <section class=\'ContainerComment\'><article class=\'contentDispayComment\'>
          <h1>${itemComment["Content"]}</h1>
      </article>
      <section class=\'itemDispayComment\'>
          <section class=\'persion\'>
              <img src=\'../assets/img/admin/${itemComment["ImageAccounts"]}\' alt=\'img\'>
              <article class=\'title\'>
                  <h1>${itemComment["NameAccount"]}</h1>
                  <p>Khách hàng</p>
              </article>
          </section>
      </section>
  </section>`;
        }
      }
  
      // Hiển thị sản phẩm khi trạng thái ban đầu
      displayComment();
      index.innerHTML = currentPage + 1;

      // Xử lý sự kiện khi nhấn nút "prev" (sang trang trước)
      nextBtn.addEventListener("click", function() {
        if (currentPage > 0) {
          currentPage--;
          displayComment();
          index.innerHTML = currentPage + 1;
        }
      });
  
      // Xử lý sự kiện khi nhấn nút "next" (sang trang tiếp theo)
      prevBtn.addEventListener("click", function() {
        if ((currentPage + 1) * commentPerPage < dataComment.length) {
          currentPage++;
          displayComment();
          index.innerHTML = currentPage + 1;
        }
      });

    });
}
function onloadProductCalorieBalance(products, next, back,  classData, numberProductPage) {
    document.addEventListener("DOMContentLoaded", function() {
      const productSection = document.getElementById(classData);
      const prevBtn = document.getElementById(back);
      const nextBtn = document.getElementById(next);
  
      const productsPerPage = numberProductPage; // Số lượng sản phẩm mỗi trang
      let currentPage = 0; // Trang hiện tại
  
      function displayProducts() {
        productSection.innerHTML = ""; // Xóa sản phẩm hiện tại trước khi hiển thị sản phẩm mới
        
        const startIndex = currentPage * productsPerPage;
        const endIndex = (currentPage + 1) * productsPerPage;
        const productsToShow = products.slice(startIndex, endIndex);
  
        for (let i = 0; i < productsToShow.length; i++) {
          const itemProduct = productsToShow[i];
          productSection.innerHTML += `
          <a href='?act=LoadChiTietSanPham&id=${itemProduct["IdProduct"]}&index=1' class='contentProductCalorieBalance'>
            <img src='../assets/img/admin/${itemProduct["ImageProduct"]} ' alt='img'>
            <h1> . ${itemProduct["NameProduct"]} . </h1>
          </a>;
              `
        }
      }
  
      // Hiển thị sản phẩm khi trạng thái ban đầu
      displayProducts();
  
      // Xử lý sự kiện khi nhấn nút "prev" (sang trang trước)
      nextBtn.addEventListener("click", function() {
        if (currentPage > 0) {
          currentPage--;
          displayProducts();
        }
      });
  
      // Xử lý sự kiện khi nhấn nút "next" (sang trang tiếp theo)
      prevBtn.addEventListener("click", function() {
        if ((currentPage + 1) * productsPerPage < products.length) {
          currentPage++;
          displayProducts();
        }
      });

    });
}
function onloadProductBest(products, next, back,  classData, numberProductPage) {
    document.addEventListener("DOMContentLoaded", function() {
      const productSection = document.getElementById(classData);
      const prevBtn = document.getElementById(back);
      const nextBtn = document.getElementById(next);
  
      const productsPerPage = numberProductPage; // Số lượng sản phẩm mỗi trang
      let currentPage = 0; // Trang hiện tại
  
      function displayProducts() {
        productSection.innerHTML = ""; // Xóa sản phẩm hiện tại trước khi hiển thị sản phẩm mới
        
        const startIndex = currentPage * productsPerPage;
        const endIndex = (currentPage + 1) * productsPerPage;
        const productsToShow = products.slice(startIndex, endIndex);
  
        for (let i = 0; i < productsToShow.length; i++) {
          const itemProduct = productsToShow[i];
          productSection.innerHTML += `
`
        }
      }
  
      // Hiển thị sản phẩm khi trạng thái ban đầu
      displayProducts();
  
      // Xử lý sự kiện khi nhấn nút "prev" (sang trang trước)
      nextBtn.addEventListener("click", function() {
        if (currentPage > 0) {
          currentPage--;
          displayProducts();
        }
      });
  
      // Xử lý sự kiện khi nhấn nút "next" (sang trang tiếp theo)
      prevBtn.addEventListener("click", function() {
        if ((currentPage + 1) * productsPerPage < products.length) {
          currentPage++;
          displayProducts();
        }
      });

    });
}

