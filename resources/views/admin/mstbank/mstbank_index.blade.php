@extends('layouts.app')

@section('title','Master Data Bank')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Master Data Bank</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Data Bank</h4>
                    <a href="{{ route('masterbank.create') }}" class="btn btn-success mb-2">
                        Tambah
                    </a>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Bank</th>
                            <th>Nama Bank</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td>{{$bank->kd_bank}}</td>
                                <td>{{$bank->nama_bank}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('masterbank.edit', ['masterbank' => $bank->kd_bank]) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="javascript:void(0)"  data-toggle="modal" data-target="#daModal{{$bank->kd_bank}}">Hapus</a>
                                </td>
                            </tr>
                            {{-- Modal Hapus --}}
                            <div id="daModal{{$bank->kd_bank}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Apakah yakin ingin hapus data?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="{{ route('masterbank.destroy', ['masterbank' => $bank->kd_bank]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        <div class="modal-body">
                                            Data {{$bank->nama_bank}} akan dihapus
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light" >Hapus</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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