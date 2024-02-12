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
                                    <input type="text" class="form-control"  name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group ">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value="superadmin">superadmin</option>
                                        <option value="admin">admin</option>
                                        <option value="operator">operator</option>
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

