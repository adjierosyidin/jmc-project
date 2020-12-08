@extends('layouts.app')

@section('title','Master Data Bank')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Master Data Bank</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Edit Data Bank</h4>
                    
                    <div class="row gap-20 masonry pos-r">
                        <div class="masonry-sizer col-md-12"></div>
                        <div class="masonry-item col-md-12">
                                <div class="mT-5">
                                    <form action="{{ route('masterbank.update', ['masterbank' => $bank->kd_bank]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="kd_bank">Kode Bank</label>
                                            <input disabled type="text" class="form-control @error('kd_bank') is-invalid @enderror" value="{{ $bank->kd_bank }}" name="kd_bank" id="kd_bank" placeholder="Masukkan Kode Bank">
                                            @error('kd_bank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_bank">Nama Bank</label>
                                            <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" value="{{ $bank->nama_bank }}" name="nama_bank" id="nama_bank" placeholder="Masukkan Nama Bank">
                                            @error('nama_bank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a href="{{ route('masterbank.index') }}" class="btn btn-outline-danger" id="back">Batal</a>
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