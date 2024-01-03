
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
       <a class="nav-link" href="AdminController.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Trang chủ</span>
    </a>
    <a class="nav-link" href="<?=$adminAction?>dangxuat">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Đăng Xuất</span>
    </a>

</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    DANH SÁCH
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tài Khoản</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản Lý Tài Khoản</h6>
            <a class="collapse-item" href="<?=$adminAction?>ListAccount">Danh Sách Tài Khoản</a>
            <a class="collapse-item" href="<?=$adminAction?>AddAccount">Thêm Tài Khoản</a>
            <h6 class="collapse-header">Giỏ hàng-Bill-Comment</h6>
            <a class="collapse-item" href="<?=$adminAction?>ListComment">Danh Sách Comment</a>
        </div>
    </div>
    
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Quản lý </span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product</h6>
            <a class="collapse-item" href="<?= $adminAction ?>ListProduct">Danh sách món ăn</a>
            <a class="collapse-item" href="<?= $adminAction ?>AddProduct">Thêm món ăn</a>
            <h6 class="collapse-header">Danh mục</h6>
            <a class="collapse-item" href="<?= $adminAction ?>ListCategory">Danh mục </a>
            <a class="collapse-item" href="<?=$adminAction?>AddCategory">Thêm danh mục  </a>
            <h6 class="collapse-header">Size</h6>
            <a class="collapse-item" href="<?=$adminAction?>ListSize">Size</a>
            <a class="collapse-item" href="<?=$adminAction?>AddSize">Thêm size</a>
            <h6 class="collapse-header">Danh Sách Bàn</h6>
            <a class="collapse-item" href="<?=$adminAction?>ListBan">Danh Sách Bàn</a>
            <a class="collapse-item" href="<?=$adminAction?>AddBan">Thêm bàn</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Thống Kê</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Thống kê</h6>
            <a class="collapse-item" href="<?= $adminAction ?>ThongKe">Danh sách thống kê</a>
            <a class="collapse-item" href="<?= $adminAction ?>BieuDo">Hiện thị biểu đồ</a>

        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->


<!-- Nav Item - Pages Collapse Menu -->


<!-- Nav Item - Charts -->


<!-- Nav Item - Tables -->

<!-- Divider -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>