@extends('layout.app')
@section('title', 'Sistem Manajemen Aset Jaringan')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Sistem Manjemen Asset Jaringan </h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">DATA SERVER
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-server" style="font-size:16px; color:green"> {{$serveraktif}}</i></div>
                                <div class="card-stats-item-label">Server Aktif</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-server" style="font-size:16px; color:orange"> {{$serverrusak}}</i></div>
                                <div class="card-stats-item-label">Server Error</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-server" style="font-size:16px; color:red"> {{$servermati}}</i></div>
                                <div class="card-stats-item-label">Server Deactivate </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Server</h4>
                        </div>
                        <div class="card-body">
                            {{$totalserver}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">DATA SWITCH
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-sitemap" style="font-size:16px; color:green"> 24</i></div>
                                <div class="card-stats-item-label">Switch Aktif</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-sitemap" style="font-size:16px; color:orange"> 24</i></div>
                                <div class="card-stats-item-label">Switch Error</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-sitemap" style="font-size:16px; color:red"> 24</i></div>
                                <div class="card-stats-item-label">Switch Deactivate </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total SWITCH</h4>
                        </div>
                        <div class="card-body">
                            59
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">DATA DOMAIN UNILA
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-globe" style="font-size:16px; color:green"> 24</i></div>
                                <div class="card-stats-item-label">DOMAIN APLIKASI</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-globe" style="font-size:16px; color:orange"> 24</i></div>
                                <div class="card-stats-item-label">DOMAIN SITUS</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <i class="fa fa-globe" style="font-size:16px; color:red"> 24</i></div>
                                <div class="card-stats-item-label">DOMAIN PENDING</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total DOMAIN</h4>
                        </div>
                        <div class="card-body">
                            59
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h4>Inventori Unifi Acces Point</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/unifiimg.png')}}" alt="product" ></div>
                        <div class="mt-2 font-weight-bold">PGN 2019</div>
                        <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/unifiimg.png')}}" alt="product" ></div>
                        <div class="mt-2 font-weight-bold">PGN 2020</div>
                        <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/unifiimg.png')}}" alt="product" ></div>
                        <div class="mt-2 font-weight-bold">PGN 2021</div>
                        <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/unifiimg.png')}}" alt="product" ></div>
                        <div class="mt-2 font-weight-bold">PGN 2022</div>
                        <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                    </div>
                    <div class="col mb-4 mb-lg-0 text-center">
                        <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/unifiimg.png')}}" alt="product" ></div>
                        <div class="mt-2 font-weight-bold">PGN 2023</div>
                        <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Inventori Aruba Acces Point</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/arubaimg.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2019</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/arubaimg.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2020</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/arubaimg.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2021</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Inventori Alcatel Acces Point</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/alcatel.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2019</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/alcatel.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2020</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>
                            <div class="col mb-4 mb-lg-0 text-center">
                                <div ><img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/alcatel.png')}}" alt="product" ></div>
                                <div class="mt-2 font-weight-bold">PGN 2021</div>
                                <div class="text-small "><span class="text-primary"><i class="fas fa-caret-up"></i></span> <i class="" style="color: green"> On : 100 Unit</i> / <i class="fas fa-caret-down"></i></span><i class="" style="color: red"> Off : 150 Unit</i></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>IPv4 Public Monitoring</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card gradient-bottom">
                        <div class="card-header">
                            <h4>Data IPv4 Management </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/ipv4.png')}}" alt="product">
                                    <div class="media-body">
                                        <div class="media-title">IP NETWORK 123/24</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="254"></div>
                                                <div class="budget-price-label">254 Total IP</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-success" data-width="154"></div>
                                                <div class="budget-price-label">154 IPv4 Tersisa</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="100"></div>
                                                <div class="budget-price-label">100 IPv4 Digunakan</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/ipv4.png')}}" alt="product">
                                    <div class="media-body">
                                        <div class="media-title">IP NETWORK 1/24</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="254"></div>
                                                <div class="budget-price-label">254 Total IP</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-success" data-width="154"></div>
                                                <div class="budget-price-label">154 IPv4 Tersisa</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="100"></div>
                                                <div class="budget-price-label">100 IPv4 Digunakan</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/ipv4.png')}}" alt="product">
                                    <div class="media-body">
                                        <div class="media-title">IP NETWORK 111/24</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="254"></div>
                                                <div class="budget-price-label">254 Total IP</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-success" data-width="154"></div>
                                                <div class="budget-price-label">154 IPv4 Tersisa</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="100"></div>
                                                <div class="budget-price-label">100 IPv4 Digunakan</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/ipv4.png')}}" alt="product">
                                    <div class="media-body">
                                        <div class="media-title">IP NETWORK 112/24</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="254"></div>
                                                <div class="budget-price-label">254 Total IP</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-success" data-width="154"></div>
                                                <div class="budget-price-label">154 IPv4 Tersisa</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="100"></div>
                                                <div class="budget-price-label">100 IPv4 Digunakan</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded" width="55" src="{{asset('assets/img/dashboard/ipv4.png')}}" alt="product">
                                    <div class="media-body">
                                        <div class="media-title">IP NETWORK 220/24</div>
                                        <div class="mt-1">
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-primary" data-width="254"></div>
                                                <div class="budget-price-label">254 Total IP</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-success" data-width="154"></div>
                                                <div class="budget-price-label">154 IPv4 Tersisa</div>
                                            </div>
                                            <div class="budget-price">
                                                <div class="budget-price-square bg-danger" data-width="100"></div>
                                                <div class="budget-price-label">100 IPv4 Digunakan</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer pt-3 d-flex justify-content-center">
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-primary" data-width="20"></div>
                                <div class="budget-price-label">Selling Price</div>
                            </div>
                            <div class="budget-price justify-content-center">
                                <div class="budget-price-square bg-danger" data-width="20"></div>
                                <div class="budget-price-label">Budget Price</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('customchartjs')

@endpush
