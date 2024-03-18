<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">SIMANJA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">INF</a>
        </div>

        <ul class="sidebar-menu">
            @can('index-server')
            <li class="menu-header">Data Perangkat Server</li>
            <li >
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-server"></i> <span>Server Asset</span></a>
                <ul class="dropdown-menu">
                   <li> <a href="{{route('server.index')}}">Physical Server</a></li>
                   <li> <a href="{{route('host.index')}}">Host Server</a></li>
                   <li> <a href="{{route('instance.index')}}">Guest VM Server</a></li>

                </ul>
            </li>
            @endcan
            <li class="menu-header">Data Perangkat Jaringan</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sitemap"></i> <span>Networking</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{route('networking.index')}}">Acces Point</a></li>
                    <li><a class="nav-link" href="{{route('networking.sw')}}">Switch</a></li>
                    <li><a class="nav-link" href="{{route('networking.router')}}">Router</a></li>
                    <li><a class="nav-link" href="{{route('networking.tv')}}">CCTV</a></li>
                </ul>
            </li>

            <li class="menu-header">DIGITAL ASSET</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Digital Asset</span></a>
                <ul class="dropdown-menu">
                    <li><a class="route(" href="{{route('networking.domain')}}">Domain Unila</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="{{route('networking.ip ')}}">IP Address</a></li>
                    <li><a class="nav-link" href="{{ route('networking.ls') }}">Lisensi</a></li>
                </ul>
            </li>
            @can('index-user')
                <li class="menu-header">User Manajemen</li>
                <li class="nav-item dropdown">
                    <a href="{{route('user.index')}}" class="nav-link "><i class="fas fa-users"></i><span>User Management</span></a>
                </li>
            @endcan
                <li class="menu-header">System Management</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Setting</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{route('os.index')}}">Operating System</a></li>
                        <li><a class="nav-link " href="{{route('pengadaan.index')}}">Tahun Pengadaan </a></li>
                        <li><a class="nav-link" href="{{route('rack.index')}}">Rack Number</a></li>
                    </ul>
                </li>

        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{route('home')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Halaman Home
            </a>
        </div>
    </aside>
</div>
