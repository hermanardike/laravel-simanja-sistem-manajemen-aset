@extends('layout.app')
@section('title','Simanja : Add New Server')
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
                            <form METHOD="POST" action="{{route('server.store')}}">
                                @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="srv_name">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="srv_ip">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User : Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="srv_auth">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Specification</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="srv_spec"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="srv_owner">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rack Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="id_rack" id="id_rack">
                                        <option value="">Pilih Rack Server</option>
                                        @foreach($rack as $racks)
                                        <option value="{{$racks->id_rack}}">{{$racks->rack_number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="thn_pengadaan" id="thn_pengadaan">
                                        <option value="">Pilih Tahun Pengadaan</option>
                                        @foreach($pengadaan as $thn)
                                        <option value="{{$thn->id_pengadaan}}">{{$thn->thn_pengadaan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric" name="srv_status" id="srv_status">
                                        <option value=" ">Pilih Status Device</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Server Information</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="srv_keterangan"></textarea>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@endpush