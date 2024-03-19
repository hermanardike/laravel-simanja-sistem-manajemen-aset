@extends('layout.app')
@section('title','Edit Data Pengadaan')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('pengadaan.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1> <i class="fa fa-cog"></i> Edit Tahun Pengadaan Setting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('pengadaan.index')}}">Tahun Pengadaan</a></div>
                <div class="breadcrumb-item">Edit Tahun Pengadaan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Tahun Pengadaan  </h2>
            <p class="section-lead">
                Halaman Mengubah Tahun Pengadaan
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
                            <h4>Edit Tahun Pengadaan Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST" action="/pengadaan/{{$pengadaan->id_pengadaan}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('thn_pengadaan') is-invalid @enderror" name="thn_pengadaan" value="{{$pengadaan->thn_pengadaan}}" placeholder="Masukan Data Tahun Pengadaan">
                                        @error('thn_pengadaan')
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
