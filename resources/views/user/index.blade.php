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
                You can manage all posts, such as editing, deleting and more.
            </p>

            @if (session('status'))
                <div class="alert alert-warning alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Management</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <div class="section-header-button">
                                    <a href="{{route('user.create')}}" class="btn btn-primary">Add Users</a>
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
                                                   onclick="event.preventDefault(); document.getElementById('delete').submit()">
                                                     Delete </a>
                                                <form id="delete" action="/user/{{$user->id}}" method="POST" style="display: none;">
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

