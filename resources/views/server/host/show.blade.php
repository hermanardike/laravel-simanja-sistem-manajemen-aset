@extends('layout.app')
@section('title','Details Host Server')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('host.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Details Host Server</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('host.index')}}">Host Server</a></div>
                <div class="breadcrumb-item">Details Host Server</div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Data Host  : {{$host->host_name}} </h2>
            <p class="section-lead"> Menampilkan Details Data Host Server .</p>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary ">
                        <div class="card-header bg-whitesmoke">
                            <h4>Server Images</h4>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel owl-theme slider" id="slider1">
                                <div><img alt="image" src="../assets/img/news/img01.jpg"></div>
                                <div><img alt="image" src="../assets/img/news/img08.jpg"></div>
                                <div><img alt="image" src="../assets/img/news/img10.jpg"></div>
                                <div><img alt="image" src="../assets/img/news/img09.jpg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4>Host Server Details</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Server <span class="tabh1"> : &nbsp;{{$host->host_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabh2"> : &nbsp;{{$host->host_ip}}</span> </li>
                                    @can('auth-server')
                                    <li class="list-group-item">Server Auth <span class="tabh3"> :  <input style="border: #c9d7e0" type="password" value="{{$host->host_auth}} " id="myInputHost" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunctionHost()"> &nbsp;Show Password</span>
                                    </li>
                                    @endcan
                                    <li class="list-group-item">Host Os <span class="tabh4"> : &nbsp;{{$host->os->os_name}}</span></li>
                                    <li class="list-group-item"> Status <span class="tabh5"> : &nbsp;
                                             @if ($host->status == 'Active')
                                                <div class="badge badge-success">{{$host->status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$host->status}}</div>
                                            @endif

                                            </span></li>



                                    <li class="list-group-item">Tanggal Input  <span class="tabh8"> : &nbsp; {{ \Carbon\Carbon::parse($host->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabh9"> : &nbsp;{{\Carbon\Carbon::parse($host->updated_at)->format('d F,Y')}}</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-info ">
                        <div class="card-header bg-whitesmoke card-info ">
                            <h4>Data Server Device </h4>
                        </div>
                        <div class="card ">
                            <div class="card-body ">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Server <span class="tabs1"> : &nbsp;{{$host->server->srv_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabs2"> : &nbsp;{{$host->server->srv_ip}}</span> </li>
                                    @can('auth-server')
                                    <li class="list-group-item">Server Auth <span class="tabs3"> :  <input style="border: #c9d7e0" type="password" value="{{$host->server->srv_auth}} " id="myInputSrv" disabled>
                                           &nbsp
                                                <input type="checkbox" onclick="myFunctionSrv()"> &nbsp;Show Password</span>
                                    </li>
                                    @endcan

                                    <li class="list-group-item">Owner <span class="tabs4"> : &nbsp;{{$host->server->srv_owner}}</span></li>
                                    <li class="list-group-item"> Status <span class="tabs5"> : &nbsp;
                                             @if ($host->server->srv_status == 'Aktif')
                                                <div class="badge badge-success">{{$host->server->srv_status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$host->server->srv_status}}</div>
                                            @endif

                                            </span>
                                    </li>

                                    @foreach($pengadaan  as $thn)
                                        <li class="list-group-item">Tahun Pengadaan <span class="tabs6"> :  &nbsp;{{$thn->thn_pengadaan}}</span></li>
                                    @endforeach
                                    @foreach ($rack as $racks)
                                        <li class="list-group-item">Nomor Rack <span class="tabs7"> : &nbsp; {{$racks->rack_number}}</span></li>
                                    @endforeach
                                    <li class="list-group-item">Tanggal Input  <span class="tabs8"> : &nbsp; {{ \Carbon\Carbon::parse($host->server->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabs9"> : &nbsp;{{\Carbon\Carbon::parse($host->server->updated_at)->format('d F,Y')}}</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-info ">
                        <div class="card-header">
                            <h4>Details Server</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-spesifikasi" role="tab">Spesifikasi Server</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-ketarangan" role="tab">Keterangan Server</a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-spesifikasi" role="tabpanel" aria-labelledby="list-home-list">
                                            {!! $host->server->srv_spec !!}
                                        </div>
                                        <div class="tab-pane fade" id="list-ketarangan" role="tabpanel" aria-labelledby="list-profile-list">
                                            {!! $host->server->srv_keterangan !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-owl')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@push('js-owl')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{asset('assets/js/page/modules-slider.js')}}"></script>
@endpush

@push('devicesauth')

    <script>
        function myFunctionHost() {
            var x = document.getElementById("myInputHost");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>


    <script>
        function myFunctionSrv() {
            var x = document.getElementById("myInputSrv");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        function myFunctionInstance() {
            var x = document.getElementById("myInputInstance");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@endpush

