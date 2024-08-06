<!-- Modal -->
<div class="modal fade" id="accespointModal" tabindex="-1" role="dialog" aria-labelledby="accespointModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accespointModalLabel">Add or Edit Acces Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/accespoint/{{$ap->id_ap}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control @error('id_kode') is-invalid @enderror" name="id_kode" value="{{ $ap->id_kode ?? old('id_kode') }}" placeholder="Masukkan Kode ID">
                            @error('id_kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ap Number</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('ap_number') is-invalid @enderror" name="ap_number" value="{{ $ap->ap_number ?? old('ap_number') }}" placeholder="Masukkan Ap Number">
                            @error('ap_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ap Mac</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('ap_mac') is-invalid @enderror" name="ap_mac" value="{{ $ap->ap_mac ?? old('ap_mac') }}" placeholder="Masukkan Ap Mac">
                            @error('ap_mac')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_lokasi') is-invalid @enderror" name="id_lokasi" id="id_lokasi">
                                @foreach($lokasi as $data)
                                    <option value="{{ $data->id_lokasi }}" @selected(($ap->id_lokasi ?? old('id_lokasi')) == $data->id_lokasi)>{{ $data->nama_lokasi }}</option>
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
                            <input type="text" class="form-control @error('ap_lokasi') is-invalid @enderror" name="ap_lokasi" value="{{ $ap->ap_lokasi ?? old('ap_lokasi') }}" placeholder="Lokasi Lengkap Device">
                            @error('ap_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('id_vendor') is-invalid @enderror selectric" name="id_vendor" id="id_vendor">
                                @foreach($vendor as $vendors)
                                    <option value="{{ $vendors->id_vendor }}" @selected(($ap->id_vendor ?? old('id_vendor')) == $vendors->id_vendor)>{{ $vendors->nama_vendor }}</option>
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
                                    <option value="{{ $thn->id_pengadaan }}" @selected(($ap->id_pengadaan ?? old('id_pengadaan')) == $thn->id_pengadaan)>{{ $thn->thn_pengadaan }}</option>
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
                            <select class="form-control @error('ap_status') is-invalid @enderror selectric" name="ap_status" id="ap_status">
                                <option value="Aktif" @selected(($ap->ap_status ?? old('ap_status')) == 'Aktif')>Aktif</option>
                                <option value="Rusak" @selected(($ap->ap_status ?? old('ap_status')) == 'Rusak')>Rusak</option>
                                <option value="Mati" @selected(($ap->ap_status ?? old('ap_status')) == 'Mati')>Mati</option>
                            </select>
                            @error('ap_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('ap_author') is-invalid @enderror" name="ap_author" value="{{ $ap->ap_author ?? old('ap_author') }}" placeholder="Author">
                            @error('ap_author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Switch</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple form-control @error('ap_keterangan') is-invalid @enderror" name="ap_keterangan">{{ $ap->ap_keterangan ?? old('ap_keterangan') }}</textarea>
                            @error('ap_keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Image</label>
                        <div class="col-sm-20 col-md-7 border-0">
                            <div class="editimagebox container">
                                <a class="example-image-link" href="{{asset('storage/accespoint/' . $ap->ap_image)}}" data-lightbox="example-1">
                                    <img class="editserver" src="{{asset('storage/accespoint/thumbnails/' . $ap->ap_image)}} " alt="image-1" />
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
                            @error('ap_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save Data Acces Point</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
