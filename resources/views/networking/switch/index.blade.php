@extends('layout.app')
@section('title' , 'networking')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Switch Management</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('server.index')}}">Switch Management</a></div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Switch Management</h2>
            <p class="section-lead">
                Switch Management UPT TIK Universitas Lampung
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
                            <i class="fa fa-server" style="font-size:36px; color:white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>TOTAL SWITCH</h4>
                            </div>
                            <div class="card-body">
                                50
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
                                <h4>SWITCH AKTIF</h4>
                            </div>
                            <div class="card-body">
                                50
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
                                <h4>SWITCH ERROR</h4>
                            </div>
                            <div class="card-body">
                                50
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
                                <h4>SWITCH DEACTIVATE </h4>
                            </div>
                            <div class="card-body">
                                50
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <h4 style="font-size: medium; color: blue"><i class="fa fa-server" aria-hidden="true"></i> Tabel Data Switch</h4>
                        <div class="section-header-button">
                            <a href="{{route('switch.create')}}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Add Switch</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th style="text-align: center">Number</th>
                            <th>Switch Name</th>
                            <th>IP Address</th>
                            <th>Location</th>
                            <th>Detail Location</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sw as $index => $switch)
                        <tr>
                            <td style="text-align: center">
                                {{$index + 1}}
                            </td>
                            <td>{{$switch->sw_name}}</td>
                            <td>{{$switch->sw_ip}}</td>
                            <td>{{$switch->location->nama_lokasi}}</td>
                            <td>{{$switch->sw_lokasi}}</td>
                            <td>{{$switch->sw_status}}</td>
                            <td>
                                <a href="switch/{{$switch->id_switch}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> </a>
                                <a href="switch/{{$switch->id_switch}}"  class="btn btn-danger btn-sm"
                                   onclick="event.preventDefault(); document.getElementById('del-{{$switch->id_switch}}')"

                                   data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus Switch : {{$switch->sw_name}} "  data-confirm-yes="submit({{$switch->id_switch}})">
                                    <i class="fa fa-trash"></i> </a>
                                <form id="del-{{$switch->id_switch}}" action="/switch/{{$switch->id_switch}}" method="POST" style="display: none;">
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
                                                    Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr >
                            <th style="text-align: center">Number</th>
                            <th>Switch Name</th>
                            <th>IP Address</th>
                            <th>Location</th>
                            <th>Vendor</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css-datatable')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
@endpush
@push('js-datatable')
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable(
                {
                    language: {
                        lengthMenu: 'Display _MENU_ _ENTRIES_',
                        entries: {
                            _: 'switch',
                        },

                    }
                }
            );
        } );
    </script>
@endpush

