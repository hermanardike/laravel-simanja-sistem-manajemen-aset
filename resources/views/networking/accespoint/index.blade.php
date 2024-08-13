@extends('layout.app')
@section('title', 'Accespoint')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="">Data Acces Point</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Acces Point Management</a></div>
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
                                    <h4>TOTAL Acces Point</h4>
                                </div>
                                <div class="card-body">
                                    {{ $accespoint->count() }}
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
                                    <h4>Acces Point AKTIF</h4>
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
                                    <h4>Acces Point ERROR</h4>
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
                                    <h4>Acces Point DEACTIVATE </h4>
                                </div>
                                <div class="card-body">
                                    {{ $countMati }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabble Acces Point  --}}
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h4 style="font-size: medium; color: blue"><i class="fa fa-server" aria-hidden="true"></i> Tabel
                                Data Acces Point</h4>
                            <div class="section-header-button">
                                <a href="{{ route('accespoint.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus-square-o"></i> Add Acces Point</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Ap Number</th>
                                    <th>Mac</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Keteranagn</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($accespoint as $index => $ap)
                                    <tr>
                                        <td class="text-center">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="text-center">{{ $ap->ap_number }}</td>
                                        <td>{{ $ap->ap_mac }}</td>
                                        <td>{{ $ap->location->nama_lokasi }}</td>
                                        <td>{{ $ap->ap_status }}</td>
                                        <td>{{ $ap->ap_keterangan }}</td>
                                        <td>
                                            <a href="accespoint/{{ $ap->id_ap }}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-eye"></i> </a>
                                            <a href="accespoint/{{ $ap->id_ap }}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); document.getElementById('del-{{ $ap->id_ap }}')"
                                                data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus accespoint : {{ $ap->id_ap }} "
                                                data-confirm-yes="submit({{ $ap->id_ap }})">
                                                <i class="fa fa-trash"></i> </a>
                                            <form id="del-{{ $ap->id_ap }}" action="/accespoint/{{ $ap->id_ap }}"
                                                method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                        {{-- <td>
                    <a href="accespoint/{{$ap->ap_number}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> </a>
                    <a href="switch/{{$switch->id_switch}}"  class="btn btn-danger btn-sm"
                       onclick="event.preventDefault(); document.getElementById('del-{{$switch->id_switch}}')"

                       data-confirm="Hapus Data Server ? | Apakah Anda Yakin ingin Mengapus Switch : {{$switch->sw_name}} "  data-confirm-yes="submit({{$switch->id_switch}})">
                        <i class="fa fa-trash"></i> </a>
                    <form id="del-{{$switch->id_switch}}" action="/switch/{{$switch->id_switch}}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                </td> --}}
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
                {{-- Tabble Acces Point  --}}


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
                        _: 'accespoint',
                    },

                }
            });
        });
    </script>
@endpush
