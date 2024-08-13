<!-- Modal -->
<div class="modal fade" id="routerModal" tabindex="-1" role="dialog" aria-labelledby="routerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accespointModalLabel">Add or Edit Router</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/router/{{$router->id_router}}">
                    @method('PUT')
                    @csrf
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Router Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('r_name') is-invalid @enderror" name="r_name" value="{{ $router->r_name ?? old('r_name') }}" placeholder="Masukkan Nama Router">
                            @error('r_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Router IP</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('r_ip') is-invalid @enderror" name="r_ip" value="{{ $router->r_ip ?? old('r_ip') }}" placeholder="Masukkan IP Router">
                            @error('r_ip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    @can('edit-server')
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Router Auth</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('r_auth') is-invalid @enderror" name="r_auth" value="{{ $router->r_auth ?? old('r_auth') }}" placeholder="Masukkan Auth Router">
                            @error('r_auth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endcan
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_lokasi') is-invalid @enderror" name="id_lokasi" id="id_lokasi">
                                @foreach($lokasi as $data)
                                    <option value="{{ $data->id_lokasi }}" @selected(($router->id_lokasi ?? old('id_lokasi')) == $data->id_lokasi)>{{ $data->nama_lokasi }}</option>
                                @endforeach
                            </select>
                            @error('id_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('r_lokasi') is-invalid @enderror" name="r_lokasi" value="{{ $router->r_lokasi ?? old('r_lokasi') }}" placeholder="Masukkan Detail Lokasi">
                            @error('r_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('id_vendor') is-invalid @enderror selectric" name="id_vendor" id="id_vendor">
                                @foreach($vendor as $vendors)
                                    <option value="{{ $vendors->id_vendor }}" @selected(($router->id_vendor ?? old('id_vendor')) == $vendors->id_vendor)>{{ $vendors->nama_vendor }}</option>
                                @endforeach
                            </select>
                            @error('id_vendor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('id_pengadaan') is-invalid @enderror selectric" name="id_pengadaan" id="id_pengadaan">
                                @foreach($pengadaan as $thn)
                                    <option value="{{ $thn->id_pengadaan }}" @selected(($router->id_pengadaan ?? old('id_pengadaan')) == $thn->id_pengadaan)>{{ $thn->thn_pengadaan }}</option>
                                @endforeach
                            </select>
                            @error('id_pengadaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('r_status') is-invalid @enderror selectric" name="r_status" id="r_status">
                                <option value="Aktif" @selected(($router->r_status ?? old('r_status')) == 'Aktif')>Aktif</option>
                                <option value="Rusak" @selected(($router->r_status ?? old('r_status')) == 'Rusak')>Rusak</option>
                                <option value="Mati" @selected(($router->r_status ?? old('r_status')) == 'Mati')>Mati</option>
                            </select>
                            @error('r_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple form-control @error('r_keterangan') is-invalid @enderror" name="r_keterangan">{{ $router->r_keterangan ?? old('r_keterangan') }}</textarea>
                            @error('r_keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
             
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Image</label>
                        <div class="col-sm-20 col-md-7 border-0">
                            <div class="editimagebox container">
                                <a class="example-image-link" href="{{asset('storage/router/' . $router->r_image)}}" data-lightbox="example-1">
                                    <img class="editserver" src="{{asset('storage/router/thumbnails/' . $router->r_image)}} " alt="image-1" />
                                    <div class="middleedit">
                                        <div class="text">Tampilkan Gambar</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save Data Router</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
