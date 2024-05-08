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
{{--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--                                Launch demo modal--}}
{{--                            </button>--}}



                       <button type="button" class="btn btn-sm btn-primary mt-3 mr-2" style="position: absolute;  top: 0; right: 0" data-toggle="modal" data-target="#updateModal">
                                    <i class="fa fa-edit"></i> Edit Data
                      </button>


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
        <!-- Modal -->
        <div class="modal fade" id="updateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Switch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form METHOD="POST"  enctype="multipart/form-data"  action="{{route('switch.store')}}">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Switch Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('sw_name') is-invalid @enderror" name="sw_name" value="{{old('sw_name')}}" placeholder="Masukan Nama Switch ">
                                        @error('sw_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('sw_ip') is-invalid @enderror" name="sw_ip"  value="{{old('sw_ip')}}" placeholder="IPv4 Address Switch ">
                                        @error('sw_ip')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auth Switch</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('sw_auth') is-invalid @enderror" name="sw_auth" value="{{old('sw_auth')}}" placeholder="User :      /    Password :     ">
                                        @error('sw_auth')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Port Link</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('sw_uplink') is-invalid @enderror" name="sw_uplink">
                                     {{old('sw_uplink')}}
                                    </textarea>
                                        @error('sw_uplink')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
{{--                                <div class="form-group row mb-4">--}}
{{--                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>--}}
{{--                                    <div class="col-sm-12 col-md-7">--}}
{{--                                        <select class="form-control selectric @error('id_lokasi')  is-invalid @enderror" name="id_lokasi" id="id_lokasi" >--}}
{{--                                            @foreach($lokasi as $data)--}}
{{--                                                <option value="{{$data->id_lokasi}}" @selected(old('id_lokasi') == $data->id_lokasi)>{{$data->nama_lokasi}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error('id_lokasi')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{$message}}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Lokasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('sw_lokasi') is-invalid @enderror" name="sw_lokasi" value="{{old('sw_lokasi')}}" placeholder="Lokasi Lengkap Device">
                                        @error('sw_lokasi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
{{--                                <div class="form-group row mb-4">--}}
{{--                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>--}}
{{--                                    <div class="col-sm-12 col-md-7">--}}
{{--                                        <select class="form-control @error('id_vendor') is-invalid @enderror selectric" name="id_vendor" id="id_vendor">--}}
{{--                                            @foreach($vendor as $vendors)--}}
{{--                                                <option value="{{$vendors->id_vendor}}" @selected(old('id_vendor') == $vendors->id_vendor)>{{$vendors->nama_vendor}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error('id_vendor')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{$message}}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="form-group row mb-4">--}}
{{--                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>--}}
{{--                                    <div class="col-sm-12 col-md-7">--}}
{{--                                        <select class="form-control @error('id_pengadaan') is-invalid @enderror selectric" name="id_pengadaan" id="id_pengadaan">--}}
{{--                                            @foreach($pengadaan as $thn)--}}
{{--                                                <option value="{{$thn->id_pengadaan}}" @selected(old('id_pengadaan') == $thn->id_pengadaan)>{{$thn->thn_pengadaan}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error('id_pengadaan')--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{$message}}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('sw_status') is-invalid @enderror selectric" name="sw_status" id="sw_status">
                                            <option value="Aktif" @selected(old('sw_status') =='Aktif' )>Aktif</option>
                                            <option value="Rusak" @selected(old('sw_status') =='Rusak' )>Rusak</option>
                                            <option value="Mati" @selected(old('sw_status') =='Mati>' )>Mati</option>
                                        </select>
                                        @error('sw_status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Switch</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('sw_keterangan') is-invalid @enderror" name="sw_keterangan" >
                                        {{old('sw_keterangan')}}
                                    </textarea>
                                        @error('sw_keterangan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Backup Switch</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="sw_backup">
                                    </div>
                                    @error('sw_backup')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="sw_image">
                                    </div>
                                    @error('sw_image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
{{--                                <div class="form-group row mb-4">--}}
{{--                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>--}}
{{--                                    <div class="col-sm-12 col-md-7">--}}
{{--                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Data Server</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Data Switch</button>
                    </div>
                    </form>
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
        $('#updateModal').appendTo("body").modal('hide');
    </script>
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



