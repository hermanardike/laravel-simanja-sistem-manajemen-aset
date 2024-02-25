@extends('layout.app')
@section('title','Details Instance Server')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Details Data instance Server : {{$instance->instance_name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Home</a></div>
                <div class="breadcrumb-item"><a href="#">Servers</a></div>
                <div class="breadcrumb-item">Details Data Host Server</div>
            </div>
        </div>



        <div class="section-body">
            <h2 class="section-title">Dat Guest Server </h2>
            <p class="section-lead"> Menampilkan Details Data Server .</p>

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
                            <h4> Instance Server Details</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Instance <span class="tabi1"> : &nbsp;{{$instance->instance_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabi2"> : &nbsp;{{$instance->instance_ip}}</span> </li>
                                    <li class="list-group-item">Server Auth <span class="tabi3"> :  <input style="border: #c9d7e0" type="password" value="{{$instance->instance_auth}} " id="myInputInstance" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunctionInstance()"> &nbsp;Show Password</span>
                                    </li>
                                    <li class="list-group-item">Instance Os <span class="tabi4"> : &nbsp;{{$instance->os->os_name}}</span></li>
                                    <li class="list-group-item">Owner <span class="tabi5"> : &nbsp;{{$instance->instance_owner}}</span></li>
                                    <li class="list-group-item">Domain <span class="tabi6"> : &nbsp;{{$instance->instance_domain}}</span></li>
                                    <li class="list-group-item"> Instance Status <span class="tabi7"> : &nbsp;
                                             @if ($instance->instance_status == 'Active')
                                                <div class="badge badge-success">{{$instance->instance_status}}</div>
                                            @elseif($instance->instance_status == 'Deactivate')
                                                <div class="badge badge-secondary">{{$instance->instance_status}}</div>
                                            @elseif($instance->instance_status == 'Deleted')
                                                <div class="badge badge-danger">{{$instance->instance_status}}</div>
                                            @else
                                                <div class="badge badge-warning">{{$instance->instance_status}}</div>
                                            @endif

                                            </span></li>
                                    <li class="list-group-item">Tanggal Input  <span class="tabi8"> : &nbsp; {{ \Carbon\Carbon::parse($instance->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabi9"> : &nbsp;{{\Carbon\Carbon::parse($instance->updated_at)->format('d F,Y')}}</span> </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-spesifikasi-instance" role="tab">Spesifikasi  VM Instance</a>
                                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-ketarangan-instance" role="tab">Keterangan VM Instance</a>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="list-spesifikasi-instance" role="tabpanel" aria-labelledby="list-home-list">
                                                        {!! $instance->instance_spec !!}
                                                    </div>
                                                    <div class="tab-pane fade" id="list-ketarangan-instance" role="tabpanel" aria-labelledby="list-profile-list">
                                                        {!! $instance->instance_keterangan !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($server as $servers)
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-info ">
                        <div class="card-header bg-whitesmoke card-info ">
                            <h4>Data Physical Server </h4>
                        </div>
                        <div class="card ">
                            <div class="card-body ">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Server <span class="tabs1"> : &nbsp;{{$servers->srv_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabs2"> : &nbsp;{{$servers->srv_ip}}</span> </li>
                                    <li class="list-group-item">Server Auth <span class="tabs3"> :  <input style="border: #c9d7e0" type="password" value="{{$servers->srv_auth}} " id="myInputSrv" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunctionSrv()"> &nbsp;Show Password</span>
                                    </li>

                                    <li class="list-group-item">Owner <span class="tabs4"> : &nbsp;{{$servers->srv_owner}}</span></li>
                                    <li class="list-group-item"> Status <span class="tabs5"> : &nbsp;
                                             @if ($servers->srv_status == 'Aktif')
                                                <div class="badge badge-success">{{$servers->srv_status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$servers->srv_status}}</div>
                                            @endif

                                            </span></li>
                                        <li class="list-group-item">Tahun Pengadaan <span class="tabs6"> :  &nbsp;{{$servers->pengadaan->thn_pengadaan}}</span></li>


                                        <li class="list-group-item">Nomor Rack <span class="tabs7"> : &nbsp; {{$servers->rack->rack_number}}</span></li>

                                    <li class="list-group-item">Tanggal Input  <span class="tabs8"> : &nbsp; {{ \Carbon\Carbon::parse($servers->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabs9"> : &nbsp;{{\Carbon\Carbon::parse($servers->updated_at)->format('d F,Y')}}</span> </li>
                                    <li class="list-group-item">
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
                                                        {!! $servers->srv_spec !!}
                                                    </div>
                                                    <div class="tab-pane fade" id="list-ketarangan" role="tabpanel" aria-labelledby="list-profile-list">
                                                        {!! $servers->srv_keterangan !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4>Host Server Details</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Server <span class="tabh1"> : &nbsp;{{$instance->host->host_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabh2"> : &nbsp;{{$instance->host->host_ip}}</span> </li>
                                    <li class="list-group-item">Server Auth <span class="tabh3"> :  <input style="border: #c9d7e0" type="password" value="{{$instance->host->host_auth}} " id="myInputHost" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunctionHost()"> &nbsp;Show Password</span>
                                    </li>
                                    @foreach($os as $oss)
                                    <li class="list-group-item">Host Os <span class="tabh4"> : &nbsp;{{$oss->os_name}}</span></li>
                                    @endforeach
                                    <li class="list-group-item"> Status <span class="tabh5"> : &nbsp;
                                             @if ($instance->host->status == 'Active')
                                                <div class="badge badge-success">{{$instance->host->status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$instance->host->status}}</div>
                                            @endif
                                            </span></li>
                                    <li class="list-group-item">Tanggal Input  <span class="tabh6"> : &nbsp; {{ \Carbon\Carbon::parse($instance->host->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabh7"> : &nbsp;{{\Carbon\Carbon::parse($instance->host->updated_at)->format('d F,Y')}}</span> </li>
                                </ul>
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

