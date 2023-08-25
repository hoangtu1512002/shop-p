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
        <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img">
            <img src="{{ asset('images/logos/dark-logo.svg') }}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            @foreach ($menus as $menu)
                @can($menu->view)
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route($menu->route) }}" aria-expanded="false">
                            <span>
                                {!! $menu->icon !!}
                            </span>
                            <span class="hide-menu text-[14px]">{{ $menu->name }}</span>
                        </a>

                        @if (isset($menu->child))
                            <ul class="nav open-menu menu-child">
                                @foreach ($menu->child as $child)
                                    @can($child->view ?? null)
                                        <li class="nav-item menu-child-item">
                                            <a class="nav-link menu-child-link" href="{{ route($child->route) }}"
                                                aria-expanded="false">
                                                <span class="hide-menu text-[14px]"><i class="ti ti-caret-right"></i>
                                                    {{ $child->name }}
                                                </span>
                                            </a>
                                        </li>
                                    @endcan
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endcan
            @endforeach
        </ul>
    </nav>
</div>
