<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href=""><img src="/template-admin/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item ">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('data-bobot.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Bobot Parameter</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.informasitipologi.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Informasi Tipologi</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Parameter Pendukung</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('geologi-fisik.index') }}">Geologi Fisik</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('kemiringan-lereng.index') }}">Kemiringan Lereng</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.kegempaan.index') }}">Kegempaan</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.struktur-geologi.index') }}">Struktur Geologi</a>
                        </li>
                        
                    </ul>
                </li>

                
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('data-titik.index') }}">Data Titik</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('data-gempa.index') }}">Data Gempa</a>
                        </li>
                        </li>
                    </ul>
                </li>
                
                
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Pengujian Data </span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('admin.dataujilama.index') }}"> Data Uji Gempa Lama </a>
                        </li>
                        </li>
                    </ul>
                </li>

               

                

                

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>