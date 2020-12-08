@extends('layouts.app')

@section('title','Log User')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Menu Log User</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Daftar Log Bonus Member</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Tipe</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{$transaksi->user->name}}</td>
                                <td>@currency($transaksi->amount)</td>
                                <td>{{$transaksi->type}}</td>
                                <td>{{$transaksi->created_at}}</td>
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