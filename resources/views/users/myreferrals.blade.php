@extends('layouts.app')

@section('title','My Referrals')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">My Referrals</h4>
        <div class="row">
            @if($jumlah==0)
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Referral Level 1</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Asal</th>
                            <th>No. Telp</th>
                            <th>Referensi</th>
                            <th>Tgl Join</th>
                        </tr>
                    </thead>
                    
                    </table>
                </div>
            </div>
            @else
            @for($i = 1; $i <= $jumlah; $i++)
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Referral Level {{$i}}</h4>
                    <table id="dataTable{{$i}}" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Asal</th>
                            <th>No. Telp</th>
                            <th>Referensi</th>
                            <th>Tgl Join</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (${"level".$i} as $one)
                            <tr>
                                <td>{{$one->name}}</td>
                                <td>{{$one->username}}</td>
                                <td>{{$one->kabupaten->kabupaten}}</td>
                                <td>{{$one->telp}}</td>
                                <td>{{$one->referrer}}</td>
                                <td>{{date("m/d/y g:i A", strtotime($one->created_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endfor
            @endif

        </div>
    </div>
        

@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var i;
            for (i = 1; i <= {{$jumlah}}; i++) {
                $('#dataTable'+i).DataTable({
                    "order": [[ 5, "desc" ]]
                });
            }
        } );
    </script>
@endsection