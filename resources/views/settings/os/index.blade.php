@extends('layout.app')
@section('title','Simanja : Data Server')
@section('content')
        <section class="section">
            <div class="section-header">
                <h1>Operating System Setting</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Os Setting</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Table Operating System </h2>
                <p class="section-lead"><i class="fa fa-globe"></i> Operating System Option For Server State</p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if(Auth::user()->role == 'operator')
                                    <h4><i class="fa fa-circle-o-notch"></i> Table Operating System</h4>
                                @endif
                                @can('create-server')
                                <h4><div class="card-header-form note-float-left">
                                        <div class="section-header-button">
                                            <a href="{{route('os.create')}}" class="btn btn-primary"><i class="fa fa-plus"> </i> Add Operating System </a>
                                        </div>
                                    </div></h4>
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
                                            <th>Operating System</th>
                                            <th>Mark</th>
                                            <th>Create At</th>
                                            <th>Update At</th>
                                            @can('edit-server')
                                            <th>Action</th>
                                            @endcan
                                        </tr>
                                        @forelse($os as $index => $oss)
                                        <tr>
                                            <td>
                                               {{$index + $os->firstItem()}}
                                            </td>
                                            <td>{{$oss->os_name}}</td>
                                            <td class="align-middle">
                                                @if($oss->os_type == 'windows')
                                                    <i class="fa-brands fa-windows"></i>
                                               @elseif($oss->os_type == 'linux')
                                                    <i class="fa-brands fa-linux"></i>
                                                @else
                                                    <i class="fa-regular fa-window-restore"></i>
                                                @endif

                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($oss->created_at)->format('h M, Y')}}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($oss->updated_at)->format('h M, Y')}}
                                            </td>
                                            @can('edit-server')
                                            <td>
                                                <a href="/os/{{$oss->id_os}}/edit" class="btn btn-primary">Edit</a>
                                                <a href="/os/{{$oss->id_os}}" class="btn btn-danger"
                                                   onclick="event.preventDefault(); document.getElementById('del-{{$oss->id_os}}')"
                                                   data-confirm="Hapus Data Operating System ? | Apakah Anda Yakin ingin Mengapus Operating System : {{$oss->os_name}} "  data-confirm-yes="submit({{$oss->id_os}})">
                                                    Delete </a>
                                                <form id="del-{{$oss->id_os}}" action="/os/{{$oss->id_os}}" method="POST" style="display: none;">
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
                                            {{$os->withQueryString()->links()}}
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
