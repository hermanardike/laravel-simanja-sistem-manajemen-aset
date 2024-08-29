@extends('layout.app')
@section('title', 'Simanja : Show Data Domain')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('domain.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            
            <h1>Details Domain </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('domain.index') }}">Domain Management</a></div>
                <div class="breadcrumb-item">Details Domain</div>
            </div>
        </div>
     
        <div class="section-body">

            <h2 class="section-title">Details : {{ $domain->domain_name }} </h2>
            <p class="section-lead"> Menampilkan Details Domain Management .</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                    <div class="card card-primary">
                        <div class="card-header bg-whitesmoke relative">
                            <h4><i class="fa fa-server"></i> Data Domain Details </h4>
                            <button type="button" class="btn btn-sm btn-primary mt-3 mr-2 absolute top-0 right-0"
                                data-toggle="modal" data-target="#domainModal">
                                <i class="fa fa-edit"></i> Edit Data
                            </button>
                        </div>
                        <div class="card card-primary">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Domain Name :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_name }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Sub Domain :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->subdomain->subdomain_name }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Domain Type :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_type }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Domain IP :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_ip }}</span>
                                    </li>
                                   
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Pengelola :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->location->nama_lokasi }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Owner :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_owner }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">kontak :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_kontak }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Email :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_email }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Keterangan :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_keterangan }}</span>
                                    </li>
                                    {{-- <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Vendor :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->vendor->nama_vendor }}</span>
                                    </li> --}}
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Pengadaan :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ $domain->pengadaan->thn_pengadaan }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Status :</span>
                                        <span class="text-gray-700 col-span-1">
                                            @if ($domain->domain_status == 'aktif')
                                                <span
                                                    class="bg-green-500 text-white px-2 py-1 rounded">{{ $domain->domain_status }}</span>
                                            @else
                                                <span
                                                    class="bg-gray-500 text-white px-2 py-1 rounded">{{ $domain->domain_status }}</span>
                                            @endif
                                        </span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Keterangan :</span>
                                        <span class="text-gray-700 col-span-1">{!! $domain->domain_keterangan !!}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Author :</span>
                                        <span class="text-gray-700 col-span-1">{{ $domain->domain_author }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Input :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($domain->created_at)->format('d F, Y') }}</span>
                                    </li>
                                    <li class="list-group-item grid grid-cols-2 gap-4">
                                        <span class="font-medium col-span-1">Tanggal Update :</span>
                                        <span
                                            class="text-gray-700 col-span-1">{{ \Carbon\Carbon::parse($domain->updated_at)->format('d F, Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>
        </div>
        <!-- Modal -->
    </section>
    @include('digitalasset.domain.edit-modal')
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
                $('#domainModal').modal({
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
