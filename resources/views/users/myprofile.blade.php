@extends('layouts.app')

@section('title','Profile')

@section('content')

<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">Profile</h4>
    
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

            <div class="masonry-item col-md-6">
                <div class="bd bgc-white p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-20">
                            <h4 class="lh-1" style="display: inline">Data Pribadi</h4>
                                <div class="mT-20">
                                    <form method="post" action="{{ url('edituser', $users ? $users->id : '') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nik">NIK</label>
                                            <input disabled type="text" value="{{$users->nik}}" class="form-control" id="nik" name="nik" placeholder="NIK"> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input disabled type="email" value="{{$users->email}}" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" value="{{$users->name}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">No. Telp</label>
                                            <input type="text" value="{{$users->telp}}" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" placeholder="No. Telp">
                                            @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea id="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{$users->alamat}}</textarea>
                                            @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kd_provinsi">Provinsi</label>
                                            <select name="kd_provinsi" id="kd_provinsi" class="form-control @error('kd_provinsi') is-invalid @enderror">
                                                <option value="">- Pilih -</option>
                                                @foreach($provinsis as $provinsi)
                                                    <option value="{{ $provinsi->kd_provinsi }}" {{ ($users->kd_provinsi==$provinsi->kd_provinsi) ? 'selected' : '' }}>{{ $provinsi->provinsi }}</option>
                                                @endforeach
                                            </select>
                                            @error('kd_provinsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kd_kabupaten">Kabupaten</label>
                                            <select name="kd_kabupaten" id="kd_kabupaten" class="form-control @error('kd_kabupaten') is-invalid @enderror">
                                                <option value="">- Pilih -</option>
                                                @foreach($kabupatens as $kabupaten)
                                                    <option value="{{ $kabupaten->kd_kabupaten }}" {{ ($users->kd_kabupaten==$kabupaten->kd_kabupaten) ? 'selected' : '' }}>{{ $kabupaten->kabupaten }}</option>
                                                @endforeach
                                            </select>
                                            @error('kd_kabupaten')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="kd_kecamatan">Kecamatan</label>
                                            <select name="kd_kecamatan" id="kd_kecamatan" class="form-control @error('kd_kecamatan') is-invalid @enderror">
                                                <option value="">- Pilih -</option>
                                                @foreach($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->kd_kecamatan }}" {{ ($users->kd_kecamatan==$kecamatan->kd_kecamatan) ? 'selected' : '' }}>{{ $kecamatan->kecamatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('kd_kecamatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            
    
            <div class="masonry-item col-md-6">
                <div class="bd bgc-white p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-20">
                            <h4 class="lh-1" style="display: inline">Data Bank</h4>
                            @if(!$userbank)
                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#daModal" class="btn btn-outline-success float-right mb-2">Tambah</a>
                            @else
                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#daModal1" class="btn btn-outline-success float-right mb-2">Edit</a>
                            @endif
                        </div>
                        <div class="layer w-100">
                            <div class="layers bdB">
                                <div class="layer w-100 bdT pY-10">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>Nama Bank :</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$userbank ? "Null": $userbank->bank->nama_bank }}</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 bdT pY-10">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>No. Rekening :</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$userbank ? "Null": $userbank->no_rek }}</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 bdT pY-10">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>Nama Pemilik :</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$userbank ? "Null": $userbank->nama_pemilik }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="masonry-item col-md-6">
                <div class="bd bgc-white p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-20">
                            <h4 class="lh-1" style="display: inline">Ganti Password</h4>
                            <div class="mT-20">
                                <form method="post" action="{{ url('ganti_password') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="password_lama">Password Lama</label>
                                        <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" placeholder="Masukkan Password Lama">
                                        @error('password_lama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password Baru">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password Baru">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    </div>

</div>

{{-- Modal Add Data Bank --}}
<div id="daModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="{{ url('userbank') }}">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="kd_bank" class="control-label">Nama Bank :</label>
                        <select name="kd_bank" class="form-control @error('kd_bank') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->kd_bank }}" @if (old('kd_bank') == $bank->kd_bank) {{ 'selected' }} @endif>{{ $bank->nama_bank }}</option>
                            @endforeach
                        </select>
                        @error('kd_bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_rek" class="control-label">No. Rekening :</label>
                        <input type="text" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek">
                        @error('no_rek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik" class="control-label">Nama Pemilik :</label>
                        <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik">
                        @error('nama_pemilik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

@if($userbank)
{{-- Modal Edit Data Bank --}}
<div id="daModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="{{ url('userbank', $userbank ? $userbank->kd_bank : '') }}">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="kd_bank" class="control-label">Nama Bank :</label>
                        <select name="kd_bank" class="form-control @error('kd_bank') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->kd_bank }}" {{ ($bank->kd_bank==$userbank->kd_bank) ? 'selected' : '' }}>{{ $bank->nama_bank }}</option>
                            @endforeach
                        </select>
                        @error('kd_bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_rek" class="control-label">No. Rekening :</label>
                        <input type="text" value="{{ $userbank->no_rek }}" class="form-control @error('no_rek') is-invalid @enderror" name="no_rek">
                        @error('no_rek')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pemilik" class="control-label">Nama Pemilik :</label>
                        <input type="text" value="{{ $userbank->nama_pemilik }}" class="form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik">
                        @error('nama_pemilik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif


@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
        $("#kd_provinsi").on("change", function() {
                var url = '{{ route("profilkabupaten.show", ["kabupaten"=> ":id"]) }}';
                url = url.replace(':id', this.value);

                console.log(url);
                
                $.ajax({
                    dataType: "json",
                    method: "get",
                    url: url,
                    success: function(data) {
                        $("#kd_kabupaten").prop("disabled", false);

                        var options = '<option value="">- Pilih -</option>';

                        $.each(data, function(key, value) {
                            options = options + `<option value="` + value.kd_kabupaten + `">` + value.kabupaten + `</option>`
                        });

                        $("#kd_kabupaten").html(options);
                        $("#kd_kabupaten").prop("disabled", false)
                        $('#kd_kabupaten').val('')
                        $('#kd_kecamatan').val('')
                    }
                })
            })

            $("#kd_kabupaten").on("change", function() {
            var url = '{{ route("profilkecamatan.show", ["kecamatan"=> ":id"]) }}';
            url = url.replace(':id', this.value);
            $.ajax({
                dataType: "json",
                method: "get",
                url: url,
                success: function(data) {
                    $("#kd_kecamatan").prop("disabled", false);

                    var options = '<option value="">- Pilih -</option>';

                    $.each(data, function(key, value) {
                        options = options + `<option value="` + value.kd_kecamatan + `">` + value.kecamatan + `</option>`
                    });

                    $("#kd_kecamatan").html(options);
                    $("#kd_kecamatan").prop("disabled", false)
                    $('#kd_kecamatan').val('')
                }
            })
        })

        })
    </script>
@endsection