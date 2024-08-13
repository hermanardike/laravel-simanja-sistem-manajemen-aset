@extends('layout.app')
@section('title', 'Simanja : Show Data Router')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('router.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Details Router </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('router.index') }}">Router   Management</a></div>
                <div class="breadcrumb-item">Details Router</div>
            </div>
        </div>
        <div class="section-body">

            <h2 class="section-title">Details : {{ $router->r_name }} </h2>
            <p class="section-lead"> Menampilkan Details Router Management .</p>
            @if (session('success'))
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary ">
                        <div class="card-header bg-whitesmoke">
                            <h4><i class="fa fa-picture-o" aria-hidden="true"></i>
                                Router Images
                            </h4>
                        </div>
                        <div class="card-body container">
                            <div class="owl-carousel owl-theme slider " id="slider1">
                                <div>
                                    <a class="example-image-link" href="{{ asset('storage/router/' . $router->r_image) }}"
                                        data-lightbox="example-1">

                                        <img class="image" src="{{ asset('storage/router/thumbnails/' . $router->r_image) }} "
                                            alt="image-1" />
                                        <div class="middle">
                                            <div class="text">Tampilkan Gambar</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke relative">
                            <h4><i class="fa fa-server"></i> Data Router Details </h4>
                            <button type="button" class="btn btn-sm btn-primary mt-3 mr-2 absolute top-0 right-0"
                                data-toggle="modal" data-target="#routerModal">
                                <i class="fa fa-edit"></i> Edit Data
                            </button>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Router name :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->r_name }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Router IP :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->r_ip }}</span>
                                    </li>
                                    @can('edit-server')
                                        <li class="list-group-item grid grid-cols-2 gap-4">
                                            <span class="font-medium col-span-1">Router Auth :</span>
                                            <span class="text-gray-700 col-span-1 flex items-center">
                                                <input class="border border-gray-300 rounded px-2 py-1" type="password" value="{{ $router->r_auth }}" id="myInput" disabled>
                                                <input type="checkbox" id="showPasswordCheckbox" class="ml-2">
                                                <label for="showPasswordCheckbox" class="ml-1"></label>
                                            </span>
                                        </li>
                                    @endcan
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Lokasi :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->location->nama_lokasi }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Detail Lokasi :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->r_lokasi }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Vendor :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->vendor->nama_vendor }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Pengadaan :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->pengadaan->thn_pengadaan }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Status :</span>
                                        <span class="text-gray-700 col-span-1">
                                            @if ($router->r_status == 'Aktif')
                                                <span class="bg-green-500 text-white px-2 py-1 rounded">{{ $router->r_status }}</span>
                                            @else
                                                <span class="bg-gray-500 text-white px-2 py-1 rounded">{{ $router->r_status }}</span>
                                            @endif
                                        </span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Keterangan :</span>
                                        <span class="text-gray-700 col-span-1">{!! $router->r_keterangan !!}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Author :</span>
                                        <span class="text-gray-700 col-span-1">{{ $router->r_author }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Input :</span>
                                        <span class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($router->created_at)->format('d F, Y') }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Update :</span>
                                        <span class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($router->updated_at)->format('d F, Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Details Router</h4>
                        </div>
                        <div class="card-body card-primary ">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                                            data-toggle="list" href="#list-spesifikasi" role="tab">Keterangan Router</a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-spesifikasi" role="tabpanel"
                                            aria-labelledby="list-home-list">
                                            {!! $router->r_keterangan !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </section>
    @include('networking.router.edit-modal')
@endsection
@push('css-tab')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/tab/switch/tab-switch.css') }}"> --}}
@endpush
@push('custom-owl')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@push('js-owl')
    @if (Session::has('errors'))
        <script>
            $(document).ready(function() {
                $('#routerModal').modal({
                    show: true
                });
            });
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/js/page/modules-slider.js') }}"></script>
@endpush
@push('customJS')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
         document.addEventListener('DOMContentLoaded', (event) => {
            const checkbox = document.getElementById('showPasswordCheckbox');
            const passwordInput = document.getElementById('myInput');

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        });
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            credits: false,
            acceptedFileTypes: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'],
            server: {
                process: '/file-pond',
                revert: '/file-pond',
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

@endpush
    <!-- Modal -->
    {{-- </section> --}}
    {{-- @endsection --}}
