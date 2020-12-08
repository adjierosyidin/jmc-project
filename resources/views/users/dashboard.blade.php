{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title','Dashboard')

@section('content')

{{-- Modal --}}
<div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Aktifkan akunmu </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            
                <div class="modal-body">
                    <h5> <b class="text-danger">Silahkan melakukan transfer sesuai petunjuk berikut!!</b></h5>
                    <h6> <b>Lakukan transfer dengan nominal sebesar :</b></h6>
                    <h2><p class="text-center text-info">@currency( ($mstjoin) ? $mstjoin->biaya_join : 0)</p></h2>
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-4">Nama Bank: </div>
                        <div class="col-4">{{ ($mstjoin) ? $mstjoin->nama_bank : 'Null'}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">No. Rekening: </div>
                            <div class="col-4">{{ ($mstjoin) ? $mstjoin->no_rek : 'Null'}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Nama Pemilik: </div>
                            <div class="col-4">{{ ($mstjoin) ? $mstjoin->nama_pemilik : 'Null'}}</div>
                        </div>
                    </div>
                    <hr>
                    <h6> <b>Konfirmasi dengan admin, melalui No. Whatsapp :</b></h6>
                    <h2><p class="text-center text-info">{{ ($mstjoin) ? $mstjoin->no_wa : 'Null'}}</p></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            
        </div>
    </div>
</div>
{{-- End Modal --}}

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-md-6">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100">
                        <h4 class="lh-1">Ringkasan Member</h4></div>
                    <div class="layer w-100 pY-20">
                        @if(Auth::user()->activated == 'no')
                            <a id="buttonText" href="javascript:void(0)" data-toggle="modal" data-target="#modal" class="btn btn-outline-info" ></i> Activate Your Account</a>
                        @else
                            <div class="alert alert-success"> Selamat, akun kamu aktif! </div>
                        @endif
                    </div>
                    {{-- <div class="layer bdT p-20 w-100">
                        
                    </div> --}}
                    <div class="layer w-100">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Bergabung Sejak :</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{date_format(date_create(Auth::user()->created_at),"d-M-Y")}}</span></div>
                                </div>
                            </div>
                            @if(Auth::user()->activated == 'yes')
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Link Referral :</span></div>
                                    <div class="peer ta-r">
                                        <span class="fw-600 c-grey-800">
                                            <a class="text-info" href="{{ env('APP_URL') }}/register?ref={{Auth::user()->username}}">
                                                {{ env('APP_URL') }}/register?ref={{Auth::user()->username}}
                                            </a>
                                        </span>
                                        <input class="offscreen" aria-hidden="true" type="text" id="copy_ref" value="{{ env('APP_URL') }}/register?ref={{Auth::user()->username}}">
                                        <button class="btn btn-outline-secondary btn-sm" value="copy" onclick="copyToClipboard('copy_ref')">Copy</button>
                                        <span id="copied"></span>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100 mB-20">
                        <h4 class="lh-1">Detail Sponsor</h4>
                    </div>
                    <div class="layer w-100">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Nama :</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$sponsor ? "Null": $sponsor->name }}</span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Username :</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$sponsor ? "Null": $sponsor->username }}</span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Email :</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$sponsor ? "Null": $sponsor->email }}</span></div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-10">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Telp :</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">{{ !$sponsor ? "Null": $sponsor->telp }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('styles')
    <style>
        .offscreen {
            position: absolute;
            left: -999em;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            document.getElementById("copied").innerHTML = 'Copied';
        }
    </script>
@endsection