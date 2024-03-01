@extends('layout.app')
@section('title','User List')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Registrasi User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Form Registrasi User</div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="section-body">
            <h2 class="section-title">Form Registrasi User</h2>
            <p class="section-lead">
               Menambahkan User Baru
            </p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form METHOD="POST" action="{{route('user.store')}}">
                            @csrf
                            <div class="card-header">
                                <h4>Registration New User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="administrator">Administrator</option>
                                        <option value="sysadmin">Sysadmin</option>
                                        <option value="networking">Networking</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

