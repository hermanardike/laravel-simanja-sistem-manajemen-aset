@extends('layout.app')
@section('title','Details Host Server')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Details Data Server : {{$host->host_name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Home</a></div>
                <div class="breadcrumb-item"><a href="#">Servers</a></div>
                <div class="breadcrumb-item">Details Data Host Server</div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Data Host Server </h2>
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
                            <h4>Host Server Details</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Server <span class="tab1"> : &nbsp;{{$host->host_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tab2"> : &nbsp;{{$host->host_ip}}</span> </li>
                                    <li class="list-group-item">Server Auth <span class="tab3"> :  <input style="border: #c9d7e0" type="password" value="{{$host->host_auth}} " id="myInput" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password</span>
                                    </li>
                                    <li class="list-group-item">Host Os <span class="tab4"> : &nbsp;{{$host->os->os_name}}</span></li>
                                    <li class="list-group-item"> Status <span class="tab5"> : &nbsp;
                                             @if ($host->status == 'Active')
                                                <div class="badge badge-success">{{$host->status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$host->status}}</div>
                                            @endif

                                            </span></li>



                                    <li class="list-group-item">Tanggal Input  <span class="tab8"> : &nbsp; {{ \Carbon\Carbon::parse($host->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tab9"> : &nbsp;{{\Carbon\Carbon::parse($host->updated_at)->format('d F,Y')}}</span> </li>
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
                                    <li class="list-group-item"> Nama Server <span class="tab1"> : &nbsp;{{$host->server->srv_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tab2"> : &nbsp;{{$host->server->srv_ip}}</span> </li>
                                    <li class="list-group-item">Server Auth <span class="tab3"> :  <input style="border: #c9d7e0" type="password" value="{{$host->server->srv_auth}} " id="device" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myDevice()"> &nbsp;Show Password</span>
                                    </li>

                                    <li class="list-group-item">Owner <span class="tab4"> : &nbsp;{{$host->server->srv_owner}}</span></li>
                                    <li class="list-group-item"> Status <span class="tab5"> : &nbsp;
                                             @if ($host->server->srv_status == 'Aktif')
                                                <div class="badge badge-success">{{$host->server->srv_status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$host->server->srv_status}}</div>
                                            @endif

                                            </span></li>
                                    @foreach($pengadaan  as $thn)
                                        <li class="list-group-item">Tahun Pengadaan <span class="tab6"> :  &nbsp;{{$thn->thn_pengadaan}}</span></li>
                                    @endforeach
                                    @foreach ($rack as $racks)
                                        <li class="list-group-item">Nomor Rack <span class="tab7"> : &nbsp; {{$racks->rack_number}}</span></li>
                                    @endforeach
                                    <li class="list-group-item">Tanggal Input  <span class="tab8"> : &nbsp; {{ \Carbon\Carbon::parse($host->server->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tab9"> : &nbsp;{{\Carbon\Carbon::parse($host->server->updated_at)->format('d F,Y')}}</span> </li>
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
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>


    <script>
        function myDevice() {
            var x = document.getElementById("device");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

@endpush

