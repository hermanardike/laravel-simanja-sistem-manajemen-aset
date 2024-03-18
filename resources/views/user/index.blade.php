@extends('layout.app')
@section('title','User List')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users Management</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('user.index')}}">Managemen User</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
                Halaman management user yang terdaftar di sistem.
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-users" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>TOTAL USER</h4>
                            </div>
                            <div class="card-body">
                              10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fa fa-user" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>SYSADMIN</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fa fa-user" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>NETWORKING</h4>
                            </div>
                            <div class="card-body">
                               10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-user" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>OPERATOR</h4>
                            </div>
                            <div class="card-body">
                               10
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> <i class="fa fa-users"></i> User Management</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <div class="section-header-button">
                                    <a href="{{route('user.create')}}" class="btn btn-primary"> <i class="fa fa-plus-square-o"></i> Add Users</a>
                                </div>
                            </div>
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input  name="search" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th> No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    @forelse($users as $index => $user)

                                    <tr>
                                        <td> {{$index + $users->firstItem()}} </td>
                                        <td>{{$user->name}}
                                            <div class="table-links">
                                                <a href="user/{{$user->id}}">View</a>
                                                <div class="bullet"></div>
                                                <a href="/user/{{$user->id}}/edit">Edit</a>
                                                <div class="bullet"></div>

                                                <a href="/user/{{$user->id}}"  class="text-danger"
                                                   onclick="event.preventDefault(); document.getElementById('del-{{$user->id}}')"

                                                   data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus User : {{$user->name}} "  data-confirm-yes="submit({{$user->id}})">
                                                    Delete </a>
                                                <form id="del-{{$user->id}}" action="/user/{{$user->id}}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td> {{$user->phone}}</td>
                                        <td> {{$user->role}}</td>
                                        <td>
                                            @if($user->email_verified_at != null)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-warning">Pending</div>
                                            @endif
                                        </td>
                                    </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="alert alert-danger">
                                                    <h4 class="alert-heading">No Data Found</h4>
                                                    <p>
                                                        No data found in the table.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{$users->withQueryString()->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

