<!-- Modal -->
<div class="modal fade" id="cctvModal" tabindex="-1" role="dialog" aria-labelledby="cctvModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cctvModalLabel">Add or Edit CCTV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/cctv/{{$cctv->id_cctv}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode CCTV</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_kodecctv')  is-invalid @enderror" name="id_kodecctv" id="id_kodecctv" >
                                @foreach($kodecctv as $data)
                                    <option value="{{$data->id_kodecctv}}" @selected(old('id_kodecctv') == $data->id_kodecctv)>{{$data->cctv_code}}</option>
                                @endforeach
                            </select>
                            @error('id_kodecctv')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">CCTV Number</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('cctv_number') is-invalid @enderror" name="cctv_number" value="{{ $cctv->cctv_number ?? old('cctv_number') }}" placeholder="Masukkan Nomor CCTV">
                            @error('cctv_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">CCTV Mac</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('cctv_mac') is-invalid @enderror" name="cctv_mac" value="{{ $cctv->cctv_mac ?? old('cctv_mac') }}" placeholder="Masukkan Mac Address CCTV">
                            @error('cctv_mac')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_lokasi') is-invalid @enderror" name="id_lokasi" id="id_lokasi">
                                @foreach($lokasi as $data)
                                    <option value="{{ $data->id_lokasi }}" @selected(($cctv->id_lokasi ?? old('id_lokasi')) == $data->id_lokasi)>{{ $data->nama_lokasi }}</option>
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
                            <input type="text" class="form-control @error('cctv_lokasi') is-invalid @enderror" name="cctv_lokasi" value="{{ $cctv->cctv_lokasi ?? old('cctv_lokasi') }}" placeholder="Lokasi Lengkap CCTV">
                            @error('cctv_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">CCTV Type</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control  @error('cctv_type') is-invalid @enderror selectric" name="cctv_type" id="cctv_type">
                                <option value="Indoor" @selected(old('cctv_type') =='Indoor' )>Indoor</option>
                                <option value="Outdoor" @selected(old('cctv_type') =='Outdoor' )>Outdoor</option>                                        </select>
                            @error('cctv_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">CCTV IP</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('cctv_ip') is-invalid @enderror" name="cctv_ip" value="{{ $cctv->cctv_ip ?? old('cctv_ip') }}" placeholder="Masukkan IP Address CCTV">
                            @error('cctv_ip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_vendor') is-invalid @enderror" name="id_vendor" id="id_vendor">
                                @foreach($vendor as $vendors)
                                    <option value="{{ $vendors->id_vendor }}" @selected(($cctv->id_vendor ?? old('id_vendor')) == $vendors->id_vendor)>{{ $vendors->nama_vendor }}</option>
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
                            <select class="form-control selectric @error('id_pengadaan') is-invalid @enderror" name="id_pengadaan" id="id_pengadaan">
                                @foreach($pengadaan as $thn)
                                    <option value="{{ $thn->id_pengadaan }}" @selected(($cctv->id_pengadaan ?? old('id_pengadaan')) == $thn->id_pengadaan)>{{ $thn->thn_pengadaan }}</option>
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
                            <select class="form-control selectric @error('cctv_status') is-invalid @enderror" name="cctv_status" id="cctv_status">
                                <option value="Aktif" @selected(($cctv->cctv_status ?? old('cctv_status')) == 'Aktif')>Aktif</option>
                                <option value="Rusak" @selected(($cctv->cctv_status ?? old('cctv_status')) == 'Rusak')>Rusak</option>
                                <option value="Mati" @selected(($cctv->cctv_status ?? old('cctv_status')) == 'Mati')>Mati</option>
                            </select>
                            @error('cctv_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple form-control @error('cctv_keterangan') is-invalid @enderror" name="cctv_keterangan">{{ $cctv->cctv_keterangan ?? old('cctv_keterangan') }}</textarea>
                            @error('cctv_keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Image</label>
                        <div class="col-sm-20 col-md-7 border-0">
                            <div class="editimagebox container">
                                <a class="example-image-link" href="{{asset('storage/cctv/' . $cctv->cctv_image)}}" data-lightbox="example-1">
                                    <img class="editserver" src="{{asset('storage/cctv/thumbnails/' . $cctv->cctv_image)}} " alt="image-1" />
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

                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
