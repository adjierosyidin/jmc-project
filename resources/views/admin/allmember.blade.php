@extends('layouts.app')

@section('title','All Member')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">All Members</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Daftar semua member yang aktif</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Asal</th>
                            <th>Referensi</th>
                            <th>Tgl Join</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Tgl Join</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->kecamatan->kecamatan}}, {{$user->kabupaten->kabupaten}}</td>
                                <td>{{$user->referrer}}</td>
                                <td>{{$user->created_at}}</td>
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