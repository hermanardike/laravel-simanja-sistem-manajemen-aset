@extends('layout.app')
@section('title','Simanja : Data instance')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Instance Server</h1>

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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-files-o" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>TOTAL INSTANCE</h4>
                            </div>
                            <div class="card-body">
                               {{$jumlahinstance}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fa fa-files-o" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>INSTANCE ACTIVE</h4>
                            </div>
                            <div class="card-body">
                                {{$active}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fa fa-files-o" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>INSTANCE DEACTIVATE</h4>
                            </div>
                            <div class="card-body">
                                {{$deactivate}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-files-o" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>INSTANCE DELETED </h4>
                            </div>
                            <div class="card-body">
                                {{$deleted}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-files-o" aria-hidden="true"></i> Tabel Data Instance</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <div class="section-header-button">
                                    <a href="{{route('instance.create')}}" class="btn btn-primary"><i class="fa fa-plus-square-o" aria-hidden="true"> </i> Add Instance Server </a>
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
                            <table class="table table-striped" >
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
                                        <td class="text-bold menu-header" style="text-transform: uppercase"><i class="fa fa-files-o" aria-hidden="true"></i>
                                            {{$instances->instance_name}}
                                            <div class="table-links">
                                                @can('show-server')
                                                    <a href="instance/{{$instances->id_instance}}">View</a>
                                                @endcan
                                                @can('edit-server')

                                                    <div class="bullet"></div>
                                                    <a href="instance/{{$instances->id_instance}}/edit">Edit</a>
                                                    <div class="bullet">

                                                    </div>
                                                    <a href="/instance/{{$instances->id_instance}}"  class="text-danger"
                                                       onclick="event.preventDefault(); document.getElementById('del-{{$instances->id_instance}}')"

                                                       data-confirm="Hapus Data instance ? | Apakah Anda Yakin ingin Mengapus instance : {{$instances->instance_name}} "  data-confirm-yes="submit({{$instances->id_instance}})">
                                                        Delete </a>
                                                    <form id="del-{{$instances->id_instance}}" action="/instance/{{$instances->id_instance}}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @endcan
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
                                            <div class="badge badge-warning">{{$instances->instance_status}}</div>
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
