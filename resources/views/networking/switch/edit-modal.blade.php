<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Switch</h5>

            </div>
            <div class="modal-body">
                <form METHOD="POST" enctype="multipart/form-data"  action="/switch/{{$sw->id_switch}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Switch Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('sw_name') is-invalid @enderror" name="sw_name" value="{{$sw->sw_name}}" placeholder="Masukan Nama Switch ">
                            @error('sw_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IP Address</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('sw_ip') is-invalid @enderror" name="sw_ip"  value="{{$sw->sw_ip}}" placeholder="IPv4 Address Switch ">
                            @error('sw_ip')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auth Switch</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('sw_auth') is-invalid @enderror" name="sw_auth" value="{{$sw->sw_auth}}" placeholder="User :      /    Password :     ">
                            @error('sw_auth')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Port Switch</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('sw_uplink') is-invalid @enderror" name="sw_uplink" value="{{$sw->sw_uplink}}">
                            @error('sw_uplink')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_lokasi')  is-invalid @enderror" name="id_lokasi" id="id_lokasi" >
                                @foreach($lokasi as $data)
                                    <option value="{{$data->id_lokasi}}" @selected(old('id_lokasi') == $data->id_lokasi)>{{$data->nama_lokasi}}</option>
                                @endforeach
                            </select>
                            @error('id_lokasi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Lokasi</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('sw_lokasi') is-invalid @enderror" name="sw_lokasi" value="{{$sw->sw_lokasi}}">
                            @error('sw_lokasi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vendor</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('id_vendor') is-invalid @enderror selectric" name="id_vendor" id="id_vendor">
                                @foreach($vendor as $vendors)
                                    <option value="{{$vendors->id_vendor}}" @selected(old('id_vendor') == $vendors->id_vendor)>{{$vendors->nama_vendor}}</option>
                                @endforeach
                            </select>
                            @error('id_vendor')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pengadaan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control @error('id_pengadaan') is-invalid @enderror selectric" name="id_pengadaan" id="id_pengadaan">
                                @foreach($pengadaan as $thn)
                                    <option value="{{$thn->id_pengadaan}}" @selected(old('id_pengadaan') == $thn->id_pengadaan)>{{$thn->thn_pengadaan}}</option>
                                @endforeach
                            </select>
                            @error('id_pengadaan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control  @error('sw_status') is-invalid @enderror selectric" name="sw_status" id="sw_status">
                                <option value="Aktif" @selected(old('sw_status') =='Aktif' )>Aktif</option>
                                <option value="Rusak" @selected(old('sw_status') =='Rusak' )>Rusak</option>
                                <option value="Mati" @selected(old('sw_status') =='Mati>' )>Mati</option>
                            </select>
                            @error('sw_status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Details Switch</label>
                        <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple form-control @error('sw_keterangan') is-invalid @enderror" name="sw_keterangan" >
                                        {{$sw->sw_keterangan}}
                                    </textarea>
                            @error('sw_keterangan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Backup Switch</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" name="sw_backup">
                        </div>
                        @error('sw_backup')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Image</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" name="sw_image">
                        </div>
                        @error('sw_image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Save Data Switch</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
