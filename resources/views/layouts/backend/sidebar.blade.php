<div class="leftside-menu">
    <!-- Brand Logo Light -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('frontend')}}/assets/images/banglalink.png" alt="logo" style="width: 100%;height:50px;">
        </span>
        <span class="logo-sm">
            <img src="{{asset('frontend')}}/assets/images/banglalink.png" alt="small logo" style="width: 100%;height:50px;">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item {{Route::is('admin.dashboard') ? 'menuitem-active': ''}}">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link {{Route::is('admin.dashboard') ? 'active': ''}}">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item {{Route::is('admin.registerlist') ? 'menuitem-active': ''}}">
                <a href="{{route('admin.registerlist')}}" class="side-nav-link {{Route::is('admin.registerlist') ? 'active': ''}}">
                    <i class="uil-home-alt"></i>
                    <span> Register List </span>
                </a>
            </li>
            <li class="side-nav-item {{Route::is('admin.university.create') ? 'menuitem-active': ''}}">
                <a href="{{route('admin.university.create')}}" class="side-nav-link {{Route::is('admin.university.create') ? 'active': ''}}">
                    <i class="uil-home-alt"></i>
                    <span> University Entry </span>
                </a>
            </li>
            <!-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Products</a>
                        </li>
                    </ul>
                </div>
            </li> -->


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>