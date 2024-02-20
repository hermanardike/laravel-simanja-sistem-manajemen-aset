@extends('layout.app')
@section('title','Simanja : Edit Data Server')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add New Server Device</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Create New Post</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add New Server </h2>
            <p class="section-lead">
                Halaman menambahkan server fisik baru
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
                            <h4>Add Server Details</h4>
                        </div>

                        <div class="card-body" >
                            <form METHOD="POST" action="/server/{{$server->id_srv}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('srv_name') is-invalid @enderror" name="srv_name" value="{{$server->srv_name}}">
                                        @error('srv_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('srv_ip') is-invalid @enderror" name="srv_ip"  value="{{$server->srv_ip}}">
                                        @error('srv_ip')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User : Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('srv_auth') is-invalid @enderror" name="srv_auth" value="{{$server->srv_auth}}" placeholder="User :          /    Password :      ">
                                        @error('srv_auth')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Specification</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('srv_spec') is-invalid @enderror" name="srv_spec" >
                                     {{$server->srv_spec}}
                                    </textarea>
                                        @error('srv_spec')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('srv_owner') is-invalid @enderror" name="srv_owner" value="{{$server->srv_owner}}">
                                        @error('srv_owner')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rack Number</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select  class="form-control  selectric @error('id_rack')  is-invalid @enderror"  name="id_rack" id="id_rack" >
                                            @foreach($rack as $racks)
                                                <option @selected($racks->id_rack == $server->id_rack)
                                                        value="{{ $racks->id_rack }}">{{ $racks->rack_number }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_rack')
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
                                                <option @selected($thn->id_pengadaan == $server->id_pengadaan)
                                                        value="{{ $thn->id_pengadaan }}">{{ $thn->thn_pengadaan }}</option>
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
                                        <select class="form-control  @error('srv_status') is-invalid @enderror selectric" name="srv_status" id="srv_status">
                                            <option value="Aktif" @selected($server->srv_status == 'Aktif')>Aktif</option>
                                            <option value="Rusak" @selected($server->srv_status == 'Rusak')>Rusak</option>
                                            <option value="Mati" @selected($server->srv_status == 'Mati')>Mati</option>
                                        </select>
                                        @error('srv_status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Server Information</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('srv_keterangan') is-invalid @enderror" name="srv_keterangan">
                                       {{ $server->srv_keterangan}}
                                    </textarea>
                                        @error('srv_keterangan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="srv_image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Add Server Device</button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@endpush
