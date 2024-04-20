<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">a k u k a s i r</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item {{ request()->routeIs('dashboard_petugas') ? 'menu-open active' : '' }}">
                <a href="/dashboard-petugas"
                    class="nav-link {{ request()->routeIs('dashboard_petugas') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('produk', 'formproduk') ? 'menu-open active' : '' }}">
                <a href="/produk-petugas"
                    class="nav-link {{ request()->routeIs('produk', 'formproduk') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cube"></i>
                    <p>
                        Produk
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview {{ request()->is('pembelian*') ? 'menu-open' : '' }}">
                <a href="/pembelian-petugas" class="nav-link {{ request()->is('pembelian*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                    <p>
                        Pembelian
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item has-treeview {{ request()->is('user*') ? 'menu-open' : '' }}">
                <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa fa-user"></i>
                    <p>
                        User
                    </p>
                </a>
            </li> --}}
        </ul>
    </nav>
</div>
<!-- /.sidebar -->
