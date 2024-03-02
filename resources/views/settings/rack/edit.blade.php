@extends('layout.app')
@section('title','Edit Rack Numbers')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('rack.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Add New Tahun Pengadaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('rack.index')}}}}">Rack Number</a></div>
                <div class="breadcrumb-item">Edit Rack</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Rack Numbers </h2>
            <p class="section-lead">
                Halaman Menambahkan Rack Numbers
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
                            <h4>Edit  Rack Numbers Details</h4>
                        </div>
                        <div class="card-body" >
                            <form METHOD="POST" action="/rack/{{$rack->id_rack}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rack Number</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('rack_number') is-invalid @enderror" name="rack_number" value="{{$rack->rack_number}}" placeholder="RACK Number ">
                                        @error('rack_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Save Setting</button>
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
