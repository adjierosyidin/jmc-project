@extends('layouts.app')

@section('title','Master Data Join')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Master Data Join</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Edit Data Join</h4>
                    
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-12"></div>
                        <div class="masonry-item col-md-12">
                                <div class="mT-5">
                                    <form action="{{ route('masterjoin.update', ['masterjoin' => $mstjoin->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="biaya_join">Biaya Join</label>
                                            <input type="text" class="form-control @error('biaya_join') is-invalid @enderror" value="{{ $mstjoin->biaya_join }}" name="biaya_join" id="biaya_join">
                                            @error('biaya_join')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" value="{{ $mstjoin->nama_bank }}" name="nama_bank" id="nama_bank">
                                            @error('nama_bank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_rek">No. Rekening</label>
                                            <input type="text" class="form-control @error('no_rek') is-invalid @enderror" value="{{ $mstjoin->no_rek }}" name="no_rek" id="no_rek">
                                            @error('no_rek')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pemilik">Nama Pemilik</label>
                                            <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" value="{{ $mstjoin->nama_pemilik }}" name="nama_pemilik" id="nama_pemilik">
                                            @error('nama_pemilik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_wa">No. Whatsapp</label>
                                            <input type="text" class="form-control @error('no_wa') is-invalid @enderror" value="{{ $mstjoin->no_wa }}" name="no_wa" id="no_wa">
                                            @error('no_wa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="{{ route('masterjoin.index') }}" class="btn btn-outline-danger" id="back">Batal</a>
                                    </form>
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
        
    </style>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection