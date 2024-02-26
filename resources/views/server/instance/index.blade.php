@extends('layout.app')
@section('title','Simanja : Data instance')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>VM Instance Server</h1>
            <div class="section-header-button">
                <a href="{{route('instance.create')}}" class="btn btn-outline-primary">Add VM Instance Server</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('instance.index')}}">VM Instance Server</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Instance Server</h2>
            <p class="section-lead">
                Management Instance VM Server UPT TIK Universitas Lampung
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
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('server.index')}}"><h2> <i class="fas fa-server"></i> Total Data VM Instance Server : <span class="badge badge-success">{{$jumlahinstance}}</span> Instance</h2> </a>
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
                            <h4>Data instance  </h4>
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
                                        <th>INSTANCE NAME</th>
                                        <th>IP ADDRESS</th>
                                        <th>HOST SERVER</th>
                                        <th>IP HOST</th>
                                        <th>OS VERSION</th>
                                        <th>Status</th>
                                    </tr>
                                    @forelse($instance as $index => $instances)
                                        <tr>
                                            <td class="text-bold text-center "> {{$index + $instance->firstItem()}}

                                            </td>
                                            <td class="text-bold menu-header" style="text-transform: uppercase"> {{$instances->instance_name}}
                                                <div class="table-links">
                                                    <a href="instance/{{$instances->id_instance}}">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="instance/{{$instances->id_instance}}/edit">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="/instance/{{$instances->id_instance}}"  class="text-danger"
                                                       onclick="event.preventDefault(); document.getElementById('del-{{$instances->id_instance}}')"

                                                       data-confirm="Hapus Data instance ? | Apakah Anda Yakin ingin Mengapus instance : {{$instances->instance_name}} "  data-confirm-yes="submit({{$instances->id_instance}})">
                                                        Delete </a>
                                                    <form id="del-{{$instances->id_instance}}" action="/instance/{{$instances->id_instance}}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-primary text-bold">{{$instances->instance_ip}} </div>
                                            </td>
                                            <td>
                                                <div class="badge  text-bold">{{$instances->host->host_name}} </div>
                                            </td>
                                            <td class="text-primary text-bold">{{$instances->host->host_ip}}</td>
                                            <td class="text-primary text-bold">{{$instances->os->os_name}}</td>
                                            <td>
                                                @if ($instances->instance_status == 'Active')
                                                    <div class="badge badge-success">{{$instances->instance_status}}</div></td>
                                            @elseif($instances->instance_status == 'Deactivate')
                                                <div class="badge badge-secondary">{{$instances->instance_status}}</div>
                                            @elseif($instances->instance_status == 'Deleted')
                                                <div class="badge badge-danger">{{$instances->instance_status}}</div>
                                            @else
                                                <div class="badge badge-warning">{{$instances->instance_status}}</div>

                                            @endif
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
                                        {{$instance->withQueryString()->links()}}
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
