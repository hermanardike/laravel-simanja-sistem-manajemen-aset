@extends('layout.app')
@section('title', 'Simanja : Add New Acces Point')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('accespoint.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Acces Point </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('accespoint.index') }}">Acces Point Server</a></div>
                <div class="breadcrumb-item">Add New Acces Point</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Add New Acces Point </h2>
            <p class="section-lead">
                Halaman menambahkan Acces Point Server Baru
            </p>

            @if (session('status'))
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-server" aria-hidden="true"></i> Add Acces Point Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST"  enctype="multipart/form-data"  action="{{route('accespoint.store')}}">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control @error('id_kode') is-invalid @enderror" name="id_kode" value="{{old('id_kode')}}" placeholder="Masukan Kode ID ">
                                        @error('id_kode')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ap Number</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('ap_number') is-invalid @enderror" name="ap_number" value="{{old('ap_number')}}" placeholder="Masukan Ap Number">
                                        @error('ap_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ap Mac</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('ap_mac') is-invalid @enderror" name="ap_mac" value="{{old('ap_mac')}}" placeholder="Masukan Ap Mac ">
                                        @error('ap_mac')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
        

                                {{-- <div class="form-group row mb-4">
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
                                </div> --}}


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('id_lokasi')  is-invalid @enderror" name="id_lokasi" id="id_lokasi" >
                                            @foreach($lokasi as $data)
                                                <option value="{{$data->id_lokasi}}" @selected(old('id_lokasi') == $data->id_lokasi)>{{$data->nama_lokasi}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_lokasi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Lokasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('ap_lokasi') is-invalid @enderror" name="ap_lokasi" value="{{old('ap_lokasi')}}" placeholder="Lokasi Lengkap Device">
                                        @error('ap_lokasi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control @error('id_vendor') is-invalid @enderror selectric" name="id_vendor" id="id_vendor">
                                            @foreach($vendor as $vendors)
                                                <option value="{{$vendors->id_vendor}}" @selected(old('id_vendor') == $vendors->id_vendor)>{{$vendors->nama_vendor}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_vendor')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control @error('id_pengadaan') is-invalid @enderror selectric" name="id_pengadaan" id="id_pengadaan">
                                            @foreach($pengadaan as $thn)
                                                <option value="{{$thn->id_pengadaan}}" @selected(old('id_pengadaan') == $thn->id_pengadaan)>{{$thn->thn_pengadaan}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_pengadaan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('ap_status') is-invalid @enderror selectric" name="ap_status" id="ap_status">
                                            <option value="Aktif" @selected(old('ap_status') =='Aktif' )>Aktif</option>
                                            <option value="Rusak" @selected(old('ap_status') =='Rusak' )>Rusak</option>
                                            <option value="Mati" @selected(old('ap_status') =='Mati>' )>Mati</option>
                                        </select>
                                        @error('ap_status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Switch</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('ap_keterangan') is-invalid @enderror" name="ap_keterangan" >
                                        {{old('ap_keterangan')}}
                                    </textarea>
                                        @error('ap_keterangan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" name="image">
                                    </div>
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ap Author</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{old('created_at')}}" placeholder="ap auhor">
                                        @error('created_at')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Data Server</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('customCss')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJS')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            credits: false,
            acceptedFileTypes: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'],
            server: {
                process: '/file-pond',
                revert: '/file-pond',
                headers: {
                    'accept' : 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

@endpush
