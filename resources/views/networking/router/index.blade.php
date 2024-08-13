@extends('layout.app')
@section('title' , 'networking')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Device Router</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Router Management</a></div>
                {{-- <div class="breadcrumb-item">Empty State</div> --}}
            </div>
        </div>

        <div id="app">
            <section class="section">
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
                                <i class="fa fa-server" style="font-size:36px; color:white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>TOTAL Router</h4>
                                </div>
                                <div class="card-body">
                                    {{ $router->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fa fa-server" style="font-size:36px; color:white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Router AKTIF</h4>
                                </div>
                                <div class="card-body">
                                    {{ $countActive }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fa fa-server" style="font-size:36px; color:white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Router ERROR</h4>
                                </div>
                                <div class="card-body">
                                    {{ $countRusak }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fa fa-server" style="font-size:36px; color:white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Router DEACTIVATE </h4>
                                </div>
                                <div class="card-body">
                                    {{ $countMati }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabble Router  --}}
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h4 style="font-size: medium; color: blue"><i class="fa fa-server" aria-hidden="true"></i> Tabel
                                Data Router</h4>
                            <div class="section-header-button">
                                <a href="{{ route('router.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus-square-o"></i> Add Router</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Number</th>
                                    <th>Router Name</th>
                                    <th>IP Router</th>
                                    <th>Location</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($router as $index => $rt)
                                    <tr>
                                        <td style="text-align: center">
                                            {{ $index + 1 }}
                                        </td>
                                        <td>{{ $rt->r_name }}</td>
                                         <td>{{ $rt->r_ip }}</td>
                                        <td>{{ $rt->r_lokasi }}</td>
                                        <td>{!! $rt->r_keterangan !!}</td>
                                        <td>{{ $rt->r_status }}</td>
                                        <td>
                                            <a href="router/{{ $rt->id_router }}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-eye"></i> </a>
                                            <a href="router/{{ $rt->id_router }}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); document.getElementById('del-{{ $rt->id_router }}')"
                                                data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus router : {{ $rt->r_name }} "
                                                data-confirm-yes="submit({{ $rt->id_router }})">
                                                <i class="fa fa-trash"></i> </a>
                                            <form id="del-{{ $rt->id_router }}" action="/router/{{ $rt->id_router }}"
                                                method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
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
                                                            Sorry we can't find any data, to get rid of this message, make
                                                            at least 1 entry.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>
                </div>
                {{-- Tabble Router  --}}


            </section>
        </div>
    </section>
@endsection
@push('css-datatable')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
@endpush
@push('js-datatable')
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    lengthMenu: 'Display _MENU_ _ENTRIES_',
                    entries: {
                        _: 'router',
                    },

                }
            });
        });
    </script>
@endpush

