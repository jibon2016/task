<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <h3 class="mb-0 text-2xl font-bold"> <span style="color: #f1c152;">SoftVance</span> </h3>
            </a>
{{--            <a href="{{ route('dashboard') }}" class="logo">--}}
{{--                <img--}}
{{--                    src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}"--}}
{{--                    alt="navbar brand"--}}
{{--                    class="navbar-brand"--}}
{{--                    height="20"--}}
{{--                />--}}
{{--            </a>--}}
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <?php
                    $subMenu = ['dashboard'];
                ?>
                <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a
                        href="{{ route('dashboard') }}"
                        class="collapsed"
                    >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                    $subMenu = ['courses.index', 'courses.edit', 'courses.create']
                ?>
                <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#courses">
                        <i class="fas fa-book-reader"></i>
                        <p>Courses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="courses">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('courses.index') }}">
                                    <span class="sub-item">All Couses</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
