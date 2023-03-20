<div id="layoutSidenav_nav">

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!-- Danh mục -->

                <div class="sb-sidenav-menu-heading">Quản trị danh mục</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản trị danh mục
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Loại sản phẩm</a>
                        <a class="nav-link" href="">Sản phẩm</a>
                        <a class="nav-link" href="">Bài viết</a>
                    </nav>
                </div>

                <!-- Quản lý thông tin -->

                <div class="sb-sidenav-menu-heading">Quản lý thông tin</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#information"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản lý thông tin
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="information" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Danh sách đơn hàng</a>
                        <a class="nav-link" href="">Khách hàng liên hệ</a>
                    </nav>
                </div>

                                <!-- Cấu Hình User -->

                                <div class="sb-sidenav-menu-heading">Cấu hình User</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#User"
                                    aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Cấu hình User
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="User" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('admin.list_user')}}">Quản lý User</a>
                                        <a class="nav-link" href="">Danh sách quyền</a>
                                        <a class="nav-link" href="">Thông tin user</a>
                                        <a class="nav-link" href="">Thoát</a>
                                    </nav>
                                </div>

                <!-- Quản lý thông tin -->

                <div class="sb-sidenav-menu-heading">Quản lý giao diện</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#fon"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Quản lý thông tin
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="fon" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="">Danh sách đơn hàng</a>
                        <a class="nav-link" href="">Khách hàng liên hệ</a>
                    </nav>
                </div>


                <div class="sb-sidenav-footer float-end">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
    </nav>

</div>
