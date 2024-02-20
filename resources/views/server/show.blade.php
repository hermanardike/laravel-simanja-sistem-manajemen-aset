@extends('layout.app')
@section('title','Simanja : Show Data Server')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Details Data Server : {{$server->srv_name}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Home</a></div>
                <div class="breadcrumb-item"><a href="#">Servers</a></div>
                <div class="breadcrumb-item">Details Data Server</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Server </h2>
            <p class="section-lead"> Menampilkan Details Data Server .</p>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
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
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Server Details</h4>
                        </div>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> Nama Server <span class="tab1"> : &nbsp;{{$server->srv_name}}</span> </li>
                                        <li class="list-group-item">IP Address <span class="tab2"> : &nbsp;{{$server->srv_ip}}</span> </li>
                                        <li class="list-group-item">Server Auth <span class="tab3"> :  <input style="border: #c9d7e0" type="password" value="{{$server->srv_auth}} " id="myInput" disabled>
                                           &nbsp;

                                                <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password</span>
                                        </li>

                                        <li class="list-group-item">Owner <span class="tab4"> : &nbsp;{{$server->srv_owner}}</span></li>
                                        <li class="list-group-item"> Status <span class="tab5"> : &nbsp;
                                             @if ($server->srv_status == 'Aktif')
                                                    <div class="badge badge-success">{{$server->srv_status}}</div>
                                                @else
                                                    <div class="badge badge-secondary">{{$server->srv_status}}</div>
                                                @endif

                                            </span></li>
                                        <li class="list-group-item">Tahun Pengadaan <span class="tab6"> :  &nbsp;{{$server->pengadaan->thn_pengadaan}}</span></li>
                                        <li class="list-group-item">Nomor Rack <span class="tab7"> : &nbsp; {{$server->rack->rack_number}}</span></li>
                                        <li class="list-group-item">Tanggal Input  <span class="tab8"> : &nbsp; {{ \Carbon\Carbon::parse($server->created_at)->format('d F, Y')}}</span> </li>
                                        <li class="list-group-item">Tanggal Update <span class="tab9"> : &nbsp;{{\Carbon\Carbon::parse($server->updated_at)->format('d F,Y')}}</span> </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
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
                                        {!! $server->srv_spec !!}
                                    </div>
                                    <div class="tab-pane fade" id="list-ketarangan" role="tabpanel" aria-labelledby="list-profile-list">
                                        {!! $server->srv_keterangan !!}
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



