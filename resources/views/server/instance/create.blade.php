@extends('layout.app')
@section('title','Simanja : Add New Instance')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('instance.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add New VM Instance</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('instance.index')}}">Instance</a></div>
                <div class="breadcrumb-item">Create New Instance</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add New Instance VM Server </h2>
            <p class="section-lead">
                Halaman menambahkan Instance VM Server
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
                            <h4>Add Server VM  Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST" action="{{route('instance.store')}}">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instance Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('instance_name') is-invalid @enderror" name="instance_name" value="{{old('instance_name')}}">
                                        @error('instance_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('instance_ip') is-invalid @enderror" name="instance_ip"  value="{{old('instance_ip')}}">
                                        @error('instance_ip')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User : Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('instance_auth') is-invalid @enderror" name="instance_auth" value="{{old('instance_auth')}}">
                                        @error('instance_auth')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Specification</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('instance_spec') is-invalid @enderror" name="instance_spec" >
                                     {{old('instance_spec')}}
                                    </textarea>
                                        @error('instance_spec')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('instance_owner') is-invalid @enderror" name="instance_owner" value="{{old('instance_owner')}}">
                                        @error('instance_owner')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain Instance</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('instance_domain') is-invalid @enderror" name="instance_domain" value="{{old('instance_domain')}}">
                                        @error('instance_domain')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">OS Version</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('id_os')  is-invalid @enderror" name="id_os" id="id_os" >
                                            @foreach($os as $oss)
                                                <option value="{{$oss->id_os}}" @selected(old('id_os') == $oss->id_os)>{{$oss->os_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_os')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Host</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control @error('id_host') is-invalid @enderror selectric" name="id_host" id="id_host">
                                            @foreach($host as $hosts)
                                                <option value="{{$hosts->id_host}}" @selected(old('id_host') == $hosts->id_host)>{{$hosts->host_name}} : {{$hosts->host_ip}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_host')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('instance_status') is-invalid @enderror selectric" name="instance_status" id="instance_status">
                                            <option value="Active" @selected(old('instance_status') =='Active' )>Active</option>
                                            <option value="Deactivate" @selected(old('instance_status') =='Deactivate' )>Deactivate</option>
                                            <option value="Deleted" @selected(old('instance_status') =='Deleted' )>Deleted</option>
                                            <option value="Suspended" @selected(old('instance_status') =='Suspended' )>Suspended</option>
                                        </select>
                                        @error('instance_status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Server Information</label>
                                    <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('instance_keterangan') is-invalid @enderror" name="instance_keterangan">
                                        {{old('instance_keterangan')}}
                                    </textarea>
                                        @error('instance_keterangan')
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
                                        <button class="btn btn-primary" type="submit">Add VM Instance </button>
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
