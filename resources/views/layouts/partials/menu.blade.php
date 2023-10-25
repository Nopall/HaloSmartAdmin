<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner py-1">
            <!-- Page -->
            <li class="menu-item {{ Request::path() == '/' || Request::path() == '/dashbiard' ? 'active' : '' }}">
                <a href="/" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    Dashboard
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-menu"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('car.list') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-car"></i>
                            <div data-i18n="Without menu">Car type</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="{{ route('user.list') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    Users
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- / Menu -->
