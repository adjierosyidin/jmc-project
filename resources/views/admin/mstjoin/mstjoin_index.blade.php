@extends('layouts.app')

@section('title','Master Data Join')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Master Data Join</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Data Join</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Biaya Join</th>
                            <th>Nama Bank</th>
                            <th>No. Rekening</th>
                            <th>Nama Pemilik</th>
                            <th>No. Whatsapp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mstjoins as $mstjoin)
                            <tr>
                                <td>{{$mstjoin->biaya_join}}</td>
                                <td>{{$mstjoin->nama_bank}}</td>
                                <td>{{$mstjoin->no_rek}}</td>
                                <td>{{$mstjoin->nama_pemilik}}</td>
                                <td>{{$mstjoin->no_wa}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('masterjoin.edit', ['masterjoin' => $mstjoin->id]) }}">Edit</a>
                                </td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
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