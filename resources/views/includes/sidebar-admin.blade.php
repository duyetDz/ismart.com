<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('admin.index')}}">
            <span class="sidebar-brand-text align-middle">
                AdminKit
                <sup><small class="badge bg-primary text-uppercase">Pro</small></sup>
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24"
                fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square"
                stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/photos/2/giangvanduyet.jpg') }}"
                        class="avatar img-fluid rounded me-1" alt="Charles Hall" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Charles Hall
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>

                    <div class="sidebar-user-subtitle">Designer</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                <a data-bs-target="#dashboards" href="{{route('admin.index')}}"  class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <span data-bs-target="#pages" href="" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span
                        class="align-middle">Quản trị danh mục</span>
                </span>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.category')}}">Loại danh mục</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.product')}}">Sản Phẩm</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.blog')}}">Bài viết</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <span data-bs-target="#setting" href="" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span
                        class="align-middle">Quản trị giao diện</span>
                </span>
                <ul id="setting" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a href="{{route('admin.product_image')}}" class="sidebar-link" href="">Hình ảnh</a>
                    </li>
                   
                </ul>
            </li>

            <li class="sidebar-item">
                <span data-bs-target="#client" href="" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span
                        class="align-middle">Quản trị Thành viên</span>
                </span>
                <ul id="client" class="sidebar-dropdown list-unstyled collapse "
                    data-bs-parent="#client">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.member.list')}}">Danh sách thanh viên</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.order.list')}}">Quản lý đơn hàng</a>
                    </li>
                    
                </ul>
            </li>
        </ul>

        
    </div>
</nav>