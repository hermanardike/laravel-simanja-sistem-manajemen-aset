@extends('layout.app')
@section('title','Edit Operating System')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('os.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Operating System </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('host.index')}}}}">Posts</a></div>
                <div class="breadcrumb-item">Create Os</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form OS Setting  </h2>
            <p class="section-lead">
               Halaman Mengubah Sistem Operasi Setting Server
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
                            <h4><i class="fa fa-circle-o-notch"> </i> Edit OS Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST" action="/os/{{$os->id_os}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">OS Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('os_name') is-invalid @enderror" name="os_name" value="{{$os->os_name}}" placeholder="Masukan Jenis Sistem Operasi">
                                        @error('os_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('os_type') is-invalid @enderror selectric" name="os_type" id="os_type">
                                            <option value="linux" @selected($os->os_type =='linux' )>linux</option>
                                            <option value="windows" @selected($os->os_type =='windows' )>windows</option>
                                            <option value="vmware" @selected($os->os_type =='vmware' )>vmware</option>

                                        </select>
                                        @error('os_type')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Save Configuration</button>
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
