<style>
    .open-menu {
        margin-left: 16px;
        opacity: 0;
        visibility: hidden;
        height: 0px;
    }

    .open-menu li {
        width: 100%;
    }

    .open-menu.show {
        opacity: 1;
        visibility: visible;
        height: auto;
    }

    .menu-child-link {
        color: #000;
        line-height: 25px;
        border-radius: 7px;
        margin-bottom: 2px
    }

    .menu-child-link:hover {
        background-color: rgba(93, 135, 255, 0.1);
        color: #5D87FF;
    }

    .menu-child-link.active {
        background-color: rgba(93, 135, 255, 0.1);
        color: #5D87FF;
    }
</style>

<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('images/logos/dark-logo.svg') }}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            @can('view-dashboard')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu text-[14px]">Tổng quát</span>
                    </a>
                </li>
            @endcan

            @can('view-category')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.category.view') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-coinbase"></i>
                        </span>
                        <span class="hide-menu text-[14px]">Danh mục</span>
                    </a>

                    <ul class="nav open-menu menu-child">
                        <li class="nav-item menu-child-item">
                            <a class="nav-link menu-child-link" href="{{ route('admin.category.create') }}"
                                aria-expanded="false">
                                <span class="hide-menu text-[14px]">Thêm danh mục mới</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('view-product')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.product.view') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-producthunt"></i>
                        </span>
                        <span class="hide-menu text-[14px]">Quản lý sản phẩm</span>
                    </a>

                    <ul class="nav open-menu menu-child">
                        <li class="nav-item menu-child-item">
                            <a class="nav-link menu-child-link" href="{{ route('admin.product.create') }}"
                                aria-expanded="false">
                                <span class="hide-menu text-[14px]">Thêm sản phẩm mới</span>
                            </a>
                        </li>

                        <li class="nav-item menu-child-item">
                            <a class="nav-link menu-child-link" href="" aria-expanded="false">
                                <span class="hide-menu text-[14px]">Khuyễn mãi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('view-user-manager')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.user.management.view') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu text-[14px]">Quản lý người dùng</span>
                    </a>

                    <ul class="nav open-menu menu-child">
                        <li class="nav-item menu-child-item">
                            <a class="nav-link menu-child-link" href="" aria-expanded="false">
                                <span class="hide-menu text-[14px]">Thêm người dùng mới</span>
                            </a>
                        </li>

                        <li class="nav-item menu-child-item">
                            <a class="nav-link menu-child-link" href="" aria-expanded="false">
                                <span class="hide-menu text-[14px]">Phân quyền người dùng</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </nav>
</div>
