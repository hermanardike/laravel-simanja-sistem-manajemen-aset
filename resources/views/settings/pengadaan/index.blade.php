@extends('layout.app')
@section('title','Setting Tahun Pengadaan')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1><i class="fa fa-cog"></i> Tahun Pengadaan Setting </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('pengadaan.index')}}">Tahun Pengadaan</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Tahun Pengadaan </h2>
            <p class="section-lead">Tahun Pengadaan Barang atau Unit Alat.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(Auth::user()->role == 'operator')
                                <h4> Table Tahun Pengadaan</h4>
                            @endif

                            @can('create-server')
                            <h4><div class="section-header-button">
                                    <a href="{{route('pengadaan.create')}}" class="btn btn-primary"><i class="fa fa-plus"> </i> Add Tahun Pengadaan </a>
                                </div>
                            </h4>
                            @endcan
                            <div class="card-header-form float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Pengadaan</th>
                                        <th>Create At</th>
                                        <th>Update At</th>
                                        @can('create-server')
                                        <th>Action</th>
                                        @endcan
                                    </tr>
                                    @forelse($pengadaan as $index => $thn_pengadaan)
                                        <tr>
                                            <td>
                                                {{$index + $pengadaan->firstItem()}}
                                            </td>
                                            <td>{{$thn_pengadaan->thn_pengadaan}}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($thn_pengadaan->created_at)->format('h M, Y')}}
                                            </td>
                                            <td>
                                            {{ \Carbon\Carbon::parse($thn_pengadaan->updated_at)->format('h M, Y')}}
                                            </td>
                                            @can('create-server')
                                            <td>
                                                <a href="/pengadaan/{{$thn_pengadaan->id_pengadaan}}/edit" class="btn btn-primary">Edit</a>
                                                <a href="/pengadaan/{{$thn_pengadaan->id_pengadaan}}" class="btn btn-danger"
                                                   onclick="event.preventDefault(); document.getElementById('del-{{$thn_pengadaan->id_pengadaan}}')"
                                                   data-confirm="Hapus Data Operating System ? | Apakah Anda Yakin ingin Mengapus Tahun Pengadaan: {{$thn_pengadaan->thn_pengadaan}} "  data-confirm-yes="submit({{$thn_pengadaan->id_pengadaan}})">
                                                    Delete </a>
                                                <form id="del-{{$thn_pengadaan->id_pengadaan}}" action="/pengadaan/{{$thn_pengadaan->id_pengadaan}}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </td>
                                            @endcan
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
                                        {{$pengadaan->withQueryString()->links()}}
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
