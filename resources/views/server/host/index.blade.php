@extends('layout.app')
@section('title','Simanja : Data Host')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Host Server</h1>
            <div class="section-header-button">
                <a href="{{route('server.create')}}" class="btn btn-outline-primary">Add Server</a>
                <a href="{{route('host.create')}}" class="btn btn-outline-primary">Add Host</a>
                <a href="features-post-create.html" class="btn btn-outline-primary">Add Instance</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">All Posts</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Host Server</h2>
            <p class="section-lead">
                Server Management UPT TIK Universitas Lampung
            </p>

            @if (session('status'))
                <div class="alert alert-info alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('server.index')}}">Physical Server <span class="badge badge-primary">{{$jumlahserver}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('host.index')}}">Host Server <span class="badge badge-primary">{{$jmlhost}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Guest Server <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Host Server  </h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <select class="form-control selectric">
                                    <option>Fillter By Rack</option>
                                    <option>RACK 1</option>
                                    <option>RACK 2</option>
                                    <option>RACK 3</option>
                                    <option>RACK 4</option>
                                    <option>RACK 5</option>

                                </select>
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
                                        <th class="text-center text-bold">No</th>
                                        <th>Host Name</th>
                                        <th>Host IP Address</th>
                                        <th>Server Device </th>
                                        <th>IP Server Device</th>
                                        <th>Host Version</th>
                                        <th>Status</th>
                                    </tr>

                                    @forelse($host as $index => $hosts)


                                        <tr>
                                            <td class="text-bold text-center "> {{$index + $host->firstItem()}}

                                            </td>
                                            <td class="text-bold"> {{$hosts->host_name}}
                                                <div class="table-links">
                                                    <a href="/host/{{$hosts->id_host}}">View</a>
                                                    <div class="bullet"></div>
                                                    <a href=" host/{{$hosts->id_host}}/edit">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="/host/{{$hosts->id_srv}}"  class="text-danger"
                                                       onclick="event.preventDefault(); document.getElementById('del-{{$hosts->id_host}}')"

                                                       data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus server : {{$hosts->host_name}} "  data-confirm-yes="submit({{$hosts->id_host}})">
                                                        Delete </a>
                                                    <form id="del-{{$hosts->id_host}}" action="host/{{$hosts->id_host}}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-primary text-bold">{{$hosts->host_ip}} </div>
                                            </td>
                                            <td>
                                                <div class="badge  text-bold">{{$hosts->server->srv_name}} </div>
                                            </td>
                                            <td class="text-primary text-bold">{{$hosts->server->srv_ip}}</td>
                                            <td>
                                                <div class="badge  text-bold">{{$hosts->os->os_name}} </div>
                                            </td>
                                            <td>
                                                @if ($hosts->status == 'Active')
                                                    <div class="badge badge-success">{{$hosts->status}}</div>
                                                @else
                                                    <div class="badge badge-dark">{{$hosts->status}}</div>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="empty-state" data-height="400">
                                                            <div class="empty-state-icon">
                                                                <i class="fas fa-question"></i>
                                                            </div>
                                                            <h2>We couldn't find any data</h2>
                                                            <p class="lead">
                                                                Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{$host->withQueryString()->links()}}
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
