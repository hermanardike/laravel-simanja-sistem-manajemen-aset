@extends('layout.app')
@section('title', 'Simanja : Show Data CCTV')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('cctv.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            
            <h1>Details CCTV </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('cctv.index') }}">cctv Management</a></div>
                <div class="breadcrumb-item">Details CCTV</div>
            </div>
        </div>
        <div class="section-body">

            <h2 class="section-title">Details : {{ $cctv->cctv_name }} </h2>
            <p class="section-lead"> Menampilkan Details CCTV Management .</p>
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
                                CCTV Images
                            </h4>
                        </div>
                        <div class="card-body container">
                            <div class="owl-carousel owl-theme slider " id="slider1">
                                <div>
                                    <a class="example-image-link" href="{{ asset('storage/cctv/' . $cctv->cctv_image) }}"
                                        data-lightbox="example-1">

                                        <img class="image"
                                            src="{{ asset('storage/cctv/thumbnails/' . $cctv->cctv_image) }} "
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
                            <h4><i class="fa fa-server"></i> Data CCTV Details </h4>
                            <button type="button" class="btn btn-sm btn-primary mt-3 mr-2 absolute top-0 right-0"
                                data-toggle="modal" data-target="#cctvModal">
                                <i class="fa fa-edit"></i> Edit Data
                            </button>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">CCTV Kode :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->id_kodecctv }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">CCTV Number :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_number }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">CCTV MAC :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_mac }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">CCTV IP :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_ip }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">CCTV Type :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_type }}</span>
                                    </li>
                                    @can('edit-server')
                                        <li class="list-group-item grid grid-cols-2 gap-4">
                                            <span class="font-medium col-span-1">CCTV Auth :</span>
                                            <span class="text-gray-700 col-span-1 flex items-center">
                                                <input class="border border-gray-300 rounded px-2 py-1" type="password"
                                                    value="{{ $cctv->cctv_auth }}" id="myInput" disabled>
                                                <input type="checkbox" id="showPasswordCheckbox" class="ml-2">
                                                <label for="showPasswordCheckbox" class="ml-1"></label>
                                            </span>
                                        </li>
                                    @endcan
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Lokasi :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->location->nama_lokasi }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Detail Lokasi :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_lokasi }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Vendor :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->vendor->nama_vendor }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Pengadaan :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ $cctv->pengadaan->thn_pengadaan }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Status :</span>
                                        <span class="text-gray-700 col-span-1">
                                            @if ($cctv->cctv_status == 'Aktif')
                                                <span
                                                    class="bg-green-500 text-white px-2 py-1 rounded">{{ $cctv->cctv_status }}</span>
                                            @else
                                                <span
                                                    class="bg-gray-500 text-white px-2 py-1 rounded">{{ $cctv->cctv_status }}</span>
                                            @endif
                                        </span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Keterangan :</span>
                                        <span class="text-gray-700 col-span-1">{!! $cctv->cctv_keterangan !!}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Author :</span>
                                        <span class="text-gray-700 col-span-1">{{ $cctv->cctv_author }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Input :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($cctv->created_at)->format('d F, Y') }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Update :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($cctv->updated_at)->format('d F, Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke">
                            <h4><i class="fa fa-info-circle" aria-hidden="true"></i> Details CCTV</h4>
                        </div>
                        <div class="card-body card-primary ">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                                            data-toggle="list" href="#list-spesifikasi" role="tab">Keterangan
                                            CCTV</a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-spesifikasi" role="tabpanel"
                                            aria-labelledby="list-home-list">
                                            {!! $cctv->cctv_keterangan !!}
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
    @include('networking.cctv.edit-modal')
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
                $('#cctvModal').modal({
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
