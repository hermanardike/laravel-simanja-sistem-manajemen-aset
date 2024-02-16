<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIMANJA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">INF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">DATA SERVER</li>
            <li >
                <a href="{{route('server.index')}}"><i class=" fa fa-server"></i><span>Data Server</span></a>
            </li>
            <li class="menu-header">DATA PERANGKAT JARINGAN</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Networking</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="layout-default.html">Acces Point</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Switch</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Router</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">CCTV</a></li>
                </ul>
            </li>

            <li class="menu-header">DIGITAL ASSET</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Digital Asset</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Domain Unila</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">IP Address</a></li>
                    <li><a class="nav-link" href="components-chat-box.html">Lisensi</a></li>
                </ul>
            </li>
            @can('index-user')
                <li class="menu-header">User Manajemen</li>
                <li class="nav-item dropdown">
                    <a href="{{route('user.index')}}" class="nav-link "><i class="fas fa-users"></i><span>User Management</span></a>
                </li>
            @endcan
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{route('home')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Halaman Home
            </a>
        </div>
    </aside>
</div>
