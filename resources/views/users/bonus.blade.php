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

@section('title','Bonus')

@section('content')

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        
        <div class="masonry-item col-md-4">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100">
                        <h4 class="lh-1">Total Bonus</h4>
                    </div>
                    <div class="layer w-100">
                        @if($dompet)
                            <h2 class="lh-1"><p class="text-center text-info">@currency($dompet->amount)</p></h2>
                        @else
                            <h2 class="lh-1"><p class="text-center text-info">@currency(0)</p></h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="masonry-item col-md-12">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100">
                        <h4 class="lh-1">Log Bonus</h4>
                    </div>
                    <div class="layer w-100">
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tipe</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{$transaksi->type}}</td>
                                    <td>@currency($transaksi->amount)</td>
                                    <td>{{$transaksi->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('styles')
    
@endsection

@section('scripts')
    
@endsection