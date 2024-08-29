<!-- Modal -->
<div class="modal fade" id="domainModal" tabindex="-1" role="dialog" aria-labelledby="domainModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="domainModalLabel">Add or Edit Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/domain/{{$domain->id_domain}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('domain_name') is-invalid @enderror" name="domain_name" value="{{ $domain->domain_name ?? old('domain_name') }}" placeholder="Enter Domain Name">
                            @error('domain_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Domain</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_sub') is-invalid @enderror" name="id_sub">
                                @foreach($subdomains as $subdomain)
                                    <option value="{{ $subdomain->id }}" @selected(old('id_sub') == $subdomain->id)>{{ $subdomain->subdomain_name }}</option>
                                @endforeach
                            </select>
                            @error('id_sub')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain IP</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('domain_ip') is-invalid @enderror" name="domain_ip" value="{{ $domain->domain_ip ?? old('domain_ip') }}" placeholder="Enter Domain IP">
                            @error('domain_ip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('domain_status') is-invalid @enderror" name="domain_status">
                                <option value="aktif" @selected(old('domain_status') == 'aktif')>Aktif</option>
                                <option value="suspend" @selected(old('domain_status') == 'suspend')>Suspend</option>
                            </select>
                            @error('domain_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain Type</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control  @error('domain_type') is-invalid @enderror selectric" name="domain_type" id="domain_type">
                                <option value="aplikasi" @selected(old('domain_type') =='aplikasi' )>aplikasi</option>
                                <option value="website" @selected(old('domain_type') =='website' )>website</option>
                            </select>
                            @error('domain_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengadaan</label>
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
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('domain_owner') is-invalid @enderror" name="domain_owner" value="{{ $domain->domain_owner ?? old('domain_owner') }}" placeholder="Enter Owner Name">
                            @error('domain_owner')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('domain_kontak') is-invalid @enderror" name="domain_kontak" value="{{ $domain->domain_kontak ?? old('domain_kontak') }}" placeholder="Enter Contact Number">
                            @error('domain_kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" class="form-control @error('domain_email') is-invalid @enderror" name="domain_email" value="{{ $domain->domain_email ?? old('domain_email') }}" placeholder="Enter Email Address">
                            @error('domain_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengelola</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric @error('id_lokasi') is-invalid @enderror" name="id_lokasi" id="id_lokasi">
                                @foreach($lokasi as $location)
                                    <option value="{{ $location->id_lokasi }}" @selected(($domain->id_lokasi ?? old('id_lokasi')) == $location->id_lokasi)>{{ $location->nama_lokasi }}</option>
                                @endforeach
                            </select>
                            @error('id_lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple form-control @error('domain_keterangan') is-invalid @enderror" name="domain_keterangan">{{ $domain->domain_keterangan ?? old('domain_keterangan') }}</textarea>
                            @error('domain_keterangan')
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
