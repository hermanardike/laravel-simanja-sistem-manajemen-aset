@extends('layout.app')
@section('title','Simanja : Show Data Swicth')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('switch.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Details Physical Server </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('switch.index')}}">Switch Management</a></div>
                <div class="breadcrumb-item">Details Switch</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Details : {{$sw->sw_name}} </h2>
            <p class="section-lead"> Menampilkan Details Switch Management .</p>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary ">
                        <div class="card-header bg-whitesmoke">
                            <h4><i class="fa fa-picture-o" aria-hidden="true"></i>
                                Switch Images
                            </h4>
                        </div>
                        <div class="card-body container">
                            <div class="owl-carousel owl-theme slider " id="slider1">
                                <div>
                                    <a class="example-image-link" href="{{asset('storage/servers/' . $sw->sw_image)}}" data-lightbox="example-1">
                                        <img class="image" src="{{asset('storage/servers/thumbnails/' . $sw->sw_image)}} " alt="image-1" />
                                        <div class="middle">
                                            <div class="text">Tampilkan Gambar</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4 ><i class="fa fa-server"></i> Data Switch Details </h4>

                            <a href="#"> <button type="button" class="btn btn-sm btn-primary mt-3 mr-2" style="position: absolute; margin-left: 570px; top: 0px; right: 100px;">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            </a>

                            <a href="#"> <button type="button" class="btn btn-sm btn-danger mt-3 mr-2" style="position: absolute;  top: 0; right: 0">
                                    <i class="fa fa-trash"></i> Delete
                            </button>
                            </a>




                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Nama Switch <span class="tabsw1"> : &nbsp;{{$sw->sw_name}}</span> </li>
                                    <li class="list-group-item">IP Address <span class="tabsw2"> : &nbsp;{{$sw->sw_ip}}</span> </li>
                                    @can('edit-server')
                                        <li class="list-group-item">Switch Auth <span class="tabsw3"> :  <input style="border: #c9d7e0" type="password" value="{{$sw->sw_auth}} " id="myInput" disabled>
                                           &nbsp;
                                                <input type="checkbox" onclick="myFunction()"> &nbsp;Show Password</span>
                                        </li>
                                    @endcan
                                    <li class="list-group-item">Port Uplink<span class="tabsw4"> : &nbsp;{{!! $sw->sw_uplink !!}}</span></li>
                                    <li class="list-group-item">Lokasi<span class="tabsw5"> : &nbsp;{{$sw->location->nama_lokasi}}</span></li>
                                    <li class="list-group-item">Detail Lokasi<span class="tabsw6"> : &nbsp;{{$sw->sw_lokasi}}</span></li>

                                    <li class="list-group-item">Vendor <span class="tabsw7"> :  &nbsp;{{$sw->vendor->nama_vendor}}</span></li>
                                    <li class="list-group-item">Pengadaan <span class="tabsw8"> : &nbsp; {{$sw->pengadaan->thn_pengadaan}}</span></li>
                                    <li class="list-group-item"> Status <span class="tabsw5"> : &nbsp;
                                             @if ($sw->sw_status == 'Aktif')
                                                <div class="badge badge-success">{{$sw->sw_status}}</div>
                                            @else
                                                <div class="badge badge-secondary">{{$sw->sw_status}}</div>
                                            @endif
                                            </span>
                                    </li>
                                    <li class="list-group-item">Author <span class="tabsw9"> : &nbsp; {{$sw->sw_author}}</span></li>
                                    <li class="list-group-item">Tanggal Input  <span class="tabsw10"> : &nbsp; {{ \Carbon\Carbon::parse($sw->created_at)->format('d F, Y')}}</span> </li>
                                    <li class="list-group-item">Tanggal Update <span class="tabsw11"> : &nbsp;{{\Carbon\Carbon::parse($sw->updated_at)->format('d F,Y')}}</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Details Swicth</h4>
                        </div>
                        <div class="card-body card-primary ">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-spesifikasi" role="tab">Keterangan Switch</a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-spesifikasi" role="tabpanel" aria-labelledby="list-home-list">
                                            {!! $sw->sw_keterangan !!}
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
@push('css-tab')
    <link rel="stylesheet" href="{{asset('assets/css/tab/switch/tab-switch.css')}}">
@endpush
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



