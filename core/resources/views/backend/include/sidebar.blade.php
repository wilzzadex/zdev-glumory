<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ Request::is('admin/dashboard*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('back.dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-tachometer-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-section">
                <h4 class="menu-text">Master Data</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
           
           

            @if (auth()->user()->role == 'superadmin')
            <li class="menu-item {{ Request::is('admin/user*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('back.user') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-user"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data User</span>
                </a>
            </li>
            @endif

            <li class="menu-item {{ Request::is('admin/barang*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('barang') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-boxes"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data Barang</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/pelanggan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('pelanggan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-users"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data Pelanggan</span>
                </a>
            </li>


            <li class="menu-section">
                <h4 class="menu-text">Penjualan</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ Request::is('admin/penjualan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('penjualan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-shopping-cart"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Penjualan</span>
                </a>
            </li>

            <li class="menu-section">
                <h4 class="menu-text">PPH Final</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ Request::is('admin/pph*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('pajak',date('Y')) }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-chart-pie"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">PPH Final</span>
                </a>
            </li>

            
            <li class="menu-section">
                <h4 class="menu-text">Laporan</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item {{ Request::is('admin/laporan/barang*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('penjualan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-file-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data Barang</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/laporan/barang*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('penjualan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-file-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data Pelanggan</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/laporan/barang*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('penjualan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-file-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Data PPH Final</span>
                </a>
            </li>
            
            

            
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>