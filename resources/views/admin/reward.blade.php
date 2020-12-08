@extends('layouts.app')

@section('title','Reward')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Menu Reward</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Daftar Reward Member Aktif</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Referensi</th>
                            <th>Jumlah Titik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->referrer}}</td>
                                <td>{{ count($user->titik)-1 }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="javascript:void(0)"  data-toggle="modal" data-target="#daModal{{$user->id}}">Lihat</a>
                                </td>
                            </tr>
                            {{-- Modal Detail --}}
                            <div id="daModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Data Bank {{$user->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form>
                                        <div class="modal-body">
                                            @if(!$user->rekening)
                                                {{$user->name}} Belum Menambahkan Data Bank!
                                            @else
                                            <div class="form-group">
                                                <label for="nama_bank" class="control-label">Nama Bank :</label>
                                                <input disabled type="text" value="{{ ($user->rekening) ? $user->rekening->bank->nama_bank : '' }}" class="form-control" name="nama_bank" id="nama_bank">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_rek" class="control-label">No. Rekening :</label>
                                                <input disabled type="text" value="{{ ($user->rekening) ? $user->rekening->no_rek : '' }}" class="form-control" name="no_rek" id="no_rek">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pemilik" class="control-label">Nama Pemilik :</label>
                                                <input disabled type="text" value="{{ ($user->rekening) ? $user->rekening->nama_pemilik : '' }}" class="form-control" name="nama_pemilik" id="nama_pemilik">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
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