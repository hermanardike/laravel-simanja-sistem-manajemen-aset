@extends('layout.app')

@section('title', 'Simanja : Add New Domain')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('domain.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Domain</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('domain.index') }}">Domain Management</a></div>
                <div class="breadcrumb-item">Add New Domain</div>
            </div>
        </div>
        
        <div class="section-body">
            <h2 class="section-title">Add New Domain</h2>
            <p class="section-lead">
                Halaman untuk menambahkan Domain baru.
            </p>


            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                            <h4><i class="fa fa-server" aria-hidden="true"></i> Add Domain Details</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('domain.store') }}">
                                @csrf
                                
                               
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('domain_name') is-invalid @enderror" name="domain_name" value="{{ old('domain_name') }}" placeholder="Masukkan Nama Domain">
                                        @error('domain_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain IP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('domain_ip') is-invalid @enderror" name="domain_ip" value="{{ old('domain_ip') }}" placeholder="Masukkan IP Domain">
                                        @error('domain_ip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Domain</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('id_sub') is-invalid @enderror" name="id_sub">
                                            @foreach($subdomains as $subdomain)
                                                <option value="{{ $subdomain->id }}" @selected(old('id_sub') == $subdomain->id)>{{ $subdomain->subdomain_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_sub')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('domain_owner') is-invalid @enderror" name="domain_owner" value="{{ old('domain_owner') }}" placeholder="Masukkan Nama Owner">
                                        @error('domain_owner')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kontak</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('domain_kontak') is-invalid @enderror" name="domain_kontak" value="{{ old('domain_kontak') }}" placeholder="Masukkan Kontak Owner">
                                        @error('domain_kontak')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control @error('domain_email') is-invalid @enderror" name="domain_email" value="{{ old('domain_email') }}" placeholder="Masukkan Email Owner">
                                        @error('domain_email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain Type</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control  @error('domain_type') is-invalid @enderror selectric" name="domain_type" id="domain_type">
                                            <option value="aplikasi" @selected(old('domain_type') =='aplikasi' )>aplikasi</option>
                                            <option value="website" @selected(old('domain_type') =='website' )>website</option>
                                        </select>
                                        @error('domain_type')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengadaan</label>
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control @error('domain_keterangan') is-invalid @enderror" name="domain_keterangan" placeholder="Masukkan Keterangan Domain">{{ old('domain_keterangan') }}</textarea>
                                        @error('domain_keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric @error('domain_status') is-invalid @enderror" name="domain_status">
                                            <option value="aktif" @selected(old('domain_status') == 'aktif')>Aktif</option>
                                            <option value="suspend" @selected(old('domain_status') == 'suspend')>Suspend</option>
                                        </select>
                                        @error('domain_status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Domain</button>
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
