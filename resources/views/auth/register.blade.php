{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.sign')

@section('title', 'Sign Up')

@section('content')
	<div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/bg.jpg)">
        <div class="pos-a centerXY">
            
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable centerXY" style="min-width:560px">
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i></a>
            <h4 class="fw-300 c-grey-900 mB-40">Register</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="text-normal text-dark">NIK</label>
                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
    
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
    
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">No.Telp(WA)</label>
                    <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus placeholder="086912341234">
    
                    @error('telp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Alamat</label>
                    <textarea id="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required autocomplete="alamat" autofocus>{{ old('alamat') }}</textarea>
    
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="text-normal text-dark">Provinsi</label>
                    <select name="kd_provinsi" id="kd_provinsi" class="form-control @error('kd_provinsi') is-invalid @enderror" required>
                        <option value="">== Pilih ==</option>
                        @foreach($provinsis as $provinsi)
                            <option value="{{ $provinsi->kd_provinsi }}" {{-- @if (old('kd_provinsi') == $provinsi->kd_provinsi) {{ 'selected' }} @endif --}}>{{ $provinsi->provinsi }}</option>
                        @endforeach
                    </select>
                    @error('kd_provinsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Kabupaten</label>
                    <select name="kd_kabupaten" id="kd_kabupaten" class="form-control" disabled required>
                        
                    </select>
                    @error('kd_kabupaten')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Kecamatan</label>
                    <select name="kd_kecamatan" id="kd_kecamatan" class="form-control" disabled required>
                        
                    </select>
                    @error('kd_kecamatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Kode Referensi</label>
                    <input id="referrer" type="text" class="form-control @error('referrer') is-invalid @enderror" name="referrer" value="{{$ref ?? ''}}" required autocomplete="referrer" autofocus>
    
                    @error('referrer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">I agree to all Terms and Conditions</label> 
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#kd_provinsi").on("change", function() {
                var url = '{{ route("kabupaten.show", ["kabupaten"=> ":id"]) }}';
                url = url.replace(':id', this.value);
                
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
            var url = '{{ route("kecamatan.show", ["kecamatan"=> ":id"]) }}';
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

