@extends('layout.app')
@section('title','Simanja : Create Host')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add New Host Server</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Create New Post</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add New Host </h2>
            <p class="section-lead">
                Halaman Menamabhkan Host Baru
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
                            <h4>Add Host Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST" action="{{route('host.store')}}">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Host Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('host_name') is-invalid @enderror" name="host_name" value="{{old('host_name')}}" placeholder="Format Nama Server : UPT TIK  HOST">
                                        @error('host_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('host_ip') is-invalid @enderror" name="host_ip"  value="{{old('host_ip')}}" placeholder="Inputkan IPv4 yang Valid " >
                                        @error('host_ip')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Host Auth</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('host_auth') is-invalid @enderror" name="host_auth"  value="{{old('host_auth')}}" placeholder=" User : Password ">
                                        @error('host_auth')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Host OS Version</label>
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Device</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('id_srv')  is-invalid @enderror" name="id_srv" id="id_srv" >
                                            @foreach($device as $devices)
                                                <option value="{{$devices->id_srv}}" @selected(old('id_srv') == $devices->id_srv)>{{$devices->srv_name}} : {{$devices->srv_ip}} : {{$devices->rack->rack_number}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_srv')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('status') is-invalid @enderror selectric" name="status" id="status">
                                            <option value="Active" @selected(old('status') =='Active' )>Active</option>
                                            <option value="Deactive" @selected(old('status') =='Deactive' )>Deactive</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
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

